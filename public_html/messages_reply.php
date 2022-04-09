<html lang="en">
<!---------------------------  Added Style for generated table ------------------------------>
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
    padding: 15px;
    }
</style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FK - Message Reply</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>
    <center>
    <?php
        //<!-- *********************************  HEADER  ******************************* -->   
        session_start();
        include "dynamic/DBController.php";
        $keyword_err = $keyword = "";
        include "static/header.php";

        //<!-- *********************************  Grabs information from Item ID  ******************************* -->   
        if (isset($_GET['id'])) {

            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM messaging WHERE messageID = " . $id;
            $GLOBALS['msg_data'] = mysqli_query($conn, $sql);
            mysqli_query($conn, "UPDATE messaging SET status = 1 WHERE messageID = " . $id);
            $msgrow = $msg_data->fetch_assoc();
            $_itemID = $msgrow['itemID'];


            //Pulls data for item info
            $sql2 = "SELECT * FROM items WHERE itemID = " . $_itemID;
            $GLOBALS['item_data'] = mysqli_query($conn, $sql2);
            $replyerID = $msgrow['receiverID'];
            $replyeeID = $msgrow['senderID'];
        } 
        
        //<!-- *********************************  Error message if you try to message yourself  ******************************* -->   
        if ($replyerID == $replyeeID){
            echo "<br><br><br><br><br><br>You cannot message yourself!<br>Atleast not through our application.<br><br><br><br><br><br>";
        }else{
        //<!-- *********************************  Grabs information associated with item and displays it on left side  ******************************* -->   
            $itemrow = $item_data->fetch_assoc();
            ?>
            <div class="small-container">
            <div class="row">
                <div class="col-3" style="text-align:left">
                                <label>Your ID: <?php echo $_SESSION['userID'] ?></label><br>
                                <label>Item Listing: <?php echo $itemrow['itemID'] ?></label><br>
                                <label>Item Title: <?php echo $itemrow['title'] ?></label><br>
                                <label>Item Cost: <?php echo $itemrow['price'] ?></label><br><br>
                                <label>Message from user: <?php echo $msgrow['senderID'] ?></label><br>
                                <label><?php echo $msgrow['message'] ?></label><br>
                </div>
                <div class="col-3">
                    <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST"> 
                    <br><br><label>Reply:</label><br>
                    <textarea id="rmessage" name="rmessage" rows="8" cols="40"></textarea><br><br>
                    <input class="btn2 btn-green" type="submit" value="Send Reply">
                    </form>
            </div>
            </div>
        </div>
        
        <?php
        }

        //<!-- *********************************  Sends message on submission  ******************************* -->   
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $rmessage = $_POST['rmessage'];
            $rmessage = htmlentities($rmessage);
            $itemID = $itemrow['itemID'];
            $insert = mysqli_query($conn,"INSERT INTO messaging (`itemID`, `message`, `receiverID`, `senderID`) VALUES ('$itemID','$rmessage', '$replyeeID', '$replyerID')");
            if(!$insert)  {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                header("Location: messages.php");
                exit();
            }else{
                $_SESSION['pagemessage'] = "<p align=center>Reply was sent successfully.</p>";
                header("Location: messages.php");
                exit();
            }
        }

        //<!-- *********************************  FOOTER  ******************************* -->   
        include("static/footer.html");
        ?>
    </body>
</html>
<!-- Created by Dan Shields for ICS325 -->