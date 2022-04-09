<?php
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class MakeOrder extends Conversation
{
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
                    $joke = "you selected drinks";
                    $this->say($joke);
                } else {
                    $this->say("You selected food");
                }
            }
        });
    }

    /**
     * Example question
     */
    public function askReason()
    {
        $question = Question::create("Huh - you woke me up. What do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Tell a joke')->value('joke'),
                Button::create('Give me a fancy quote')->value('quote'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else {
                    $this->say("A fancy quote");
                }
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
