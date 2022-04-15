<?php
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class Suggest extends Conversation
{
    protected $options = array(
        'order' => 'Place an order',
        //ADDITIONAL OPTIONS HERE
    );

    /**
     * First question
     */
    public function prompt()
    {
        $question = Question::create("Sorry, I did not understand what you typed. Try selecting an option below: ...")
            ->fallback('Unable to ask question')
            ->callbackId('suggest_choice')
            ->addButtons([
                Button::create($this->options['order'])->value($this->options['order']),
                Button::create('Placeholder Suggestion 2')->value('function2'),
                Button::create('Placeholder Suggestion 3')->value('function3'),
                Button::create('Placeholder Suggestion 4')->value('function4'),
                Button::create('Placeholder Suggestion 5')->value('function5'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                //OPTION 1
                if ($answer->getValue() === $this->options['order']) {
                    $this->say("You selected: $answer");
                    $this->bot->startConversation(new PlaceOrder);
                } else {
                    $this->say("You selected a placeholder option");
                }

                //OTHER OPTIONS HERE
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
