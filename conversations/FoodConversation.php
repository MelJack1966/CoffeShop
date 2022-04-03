<?php

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class FoodConversation extends Conversation
{
    protected $food;

    public function askFood()
    {
        $this->ask('What food do you want?', function(Answer $answer) {

            $this->food = $answer->getText();
            if(isset($_REQUEST["term"])){
              $sql = "SELECT * FROM  items WHERE type === 1 AND 
                WHERE name LIKE ?";
              if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_term);
                if(mysqli_num_rows($result) > 0){
                  $this->say('The price is '.$row["price"]);
                  $this->say('You ordered'.$this->food);
                } else {
                  echo "Food choice not availible";
                }
              } else {
                echo "ERROR: Could not able to execute order"
              }
               mysqli_stmt_close($stmt);
            }
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askFood();
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
