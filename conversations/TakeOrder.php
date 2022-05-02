<?php

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class TakeOrder extends Conversation
{
    /**used for constructor args only*/
    protected $item = NULL;
    /**Array of menu item tuples in assoc. array form. Key is in {NAMESIZE} fmt. */
    protected $menu = array();
    /**store names of items ordered */
    protected $cartItems = array();
    /**order total for all items */
    protected $cartTotal = 0.00;
    /**used to temporarily store current item info since Answers only support primitives */
    protected $itemIndex = "0";

    public function __construct()
    {
        //constructor overload workaround
        $arguments = func_get_args();
        if (count($arguments) != 0) {
            $this->item = $arguments[0];
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        //THIS WILL EVENTUALLY SUPPLY THE ITEM VALUE TO 
        //ANOTHER FUNCTION THAT HANDLES THE ITEM DETAILS
        if ($this->item != NULL) {
            $this->say("You want a $this->item");
        }
        $this->prompt();
    }

    /**
     * Take an order
     */
    public function prompt()
    {
        $question = Question::create("What can we get started for you?")
            ->fallback('Unable to ask question')
            ->callbackId('order_choice')
            ->addButtons([
                Button::create('Drink(s)')->value('drink'),
                Button::create('Food')->value('food'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'drink') {
                    //call to get options array
                    $items = get_items('drink');
                    //present drink options as buttons
                    $this->displayItems($items);
                } else {
                    //$this->say("You selected food");
                }
            }
        });
    }

    /**Present menu items and handles user selections */
    public function displayItems($items)
    {
        $buttons = array();

        foreach ($items as $index => $item) {
            //item var contains all properties in assoc. array
            //echo var_dump($item);
            $this->menu["$index"] = $item;
            $name = $item['name'];
            $size = "({$item['size']} oz.)";
            $buttons[] = Button::create("$name $size")->value($index);
        }

        $question = Question::create("Please select a drink: ")
            ->fallback('Unable to ask question')
            ->callbackId('item_choice')
            ->addButtons($buttons);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->addToCart($answer);
                $resp = "{$this->getItemDetails($answer)} added to cart";
                $this->say($resp);
                $this->anythingElsePrompt();
            }
        });
    }

    private function anythingElsePrompt() {
        $question = Question::create("Would you like to order anything else?")
            ->fallback('Unable to ask question')
            ->callbackId('additional_order_choice')
            ->addButtons([
                Button::create('Yes')->value('y'),
                Button::create('No')->value('no'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'y') {
                    $this->prompt();
                    //call to get options array
                    //$items = get_items('drink');
                    //present drink options as buttons
                } else {
                    $resp = "Your total will be {$this->getCartTotal()}";
                    $this->say($resp);
                }
            }
        });
    }

    /**Add item to cart (order)
     * $val = the item assoc. array w/all properties
     */
    private function addToCart($index)
    {
        $this->cartItems[] = $this->menu["$index"]['name'];
        $this->addToCartTotal($this->menu["$index"]['price']);
    }

    /**Adds item cost to order
     * $val = The float value in either numeric or string form
     */
    private function addToCartTotal($val)
    {
        $this->cartTotal += floatVal($val);
    }

    /**retuns a formatted string for the total price of items in cart. Ex: $XX.XX */
    private function getCartTotal() {
        return "\$".number_format(floatval($this->cartTotal), 2);
    }

    /**Return array of cart item names */
    private function getCartItems() {
        return $this->cartItems;
    }

    /**Return string name of menu item + size. Takes an index arg*/
    private function getItemDetails($index) {
        $name = $this->menu["$index"]['name'];
        $size = $this->menu["$index"]['size'];
        return "$name ($size oz.)";
    }
}
