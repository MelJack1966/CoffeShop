<?php
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Welcome extends Conversation
{
    protected $likeCoffee = "no";
    /**
     * First question
     */
    public function prompt() {
        $this->ask('Hi! Would you like to place an order?', function(Answer $answer) {
            $this->likeCoffee = $answer->getText();
            if(
                $answer->getValue() === "yes" ||
                $answer->getValue() === "ye" || 
                $answer->getValue() === "y" ||
                $answer->getValue() === "yeah") {
                $this->bot->startConversation(new PlaceOrder);
            }
            else if(
                $answer->getValue() == "no" || 
                $answer->getValue() == "n" ||
                $answer->getValue() == "nope") {
                $this->bot->reply("Um.... okay then. <br><br>(☉_☉ )");
            }
            else {
                $this->bot->reply("Sorry I couldn't understand that, let's start over.");
                $this->prompt();
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->prompt();
    }
}
