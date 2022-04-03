<?php

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class FoodConversation extends Conversation
{
    protected $food;

    public function askFood()
    {
        $this->ask('What food do you want?', function(Answer $answer) {
            // Save result
            $this->food = $answer->getText();

            $this->say('You ordered'.$this->food);
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }

    public function stopsConversation(IncomingMessage $message)
    {
        if ($message->getText() == 'stop') {
          return true;
        }

        return false;
    }


    public function skipsConversation(IncomingMessage $message)
    {
        if ($message->getText() == 'pause') {
          return true;
        }

        return false;
      }
}

?>
