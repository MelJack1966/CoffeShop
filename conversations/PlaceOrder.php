<?php
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class PlaceOrder extends Conversation
{
    protected $item = NULL;

    public function __construct() {
        //constructor overload workaround
        $arguments = func_get_args();
        if (count($arguments) != 0) {
            $this->item = $arguments[0];
        }
    }

    /**
     * First question
     */
    public function prompt()
    {
        $question = Question::create("What would you like to order first?")
            ->fallback('Unable to ask question')
            ->callbackId('order_choice')
            ->addButtons([
                Button::create('Drink(s)')->value('drink'),
                Button::create('Food')->value('food'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'drink') {
                    $resp = "you selected drinks";
                    $this->say($resp);
                } else {
                    $this->say("You selected food");
                }
            }
        });
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
}
