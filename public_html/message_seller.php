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
    <title>FK - Send Message</title>
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
        
        //<!-- *********************************  Sends message on submission  ******************************* -->   
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $buyermessage = $_POST['bmessage'];
            $buyermessage = htmlentities($buyermessage);
            $itemID = $_SESSION['buyitem'];
            $sellerID = $_SESSION['sellerID'];
            $buyerID = $_SESSION['userID'];
            $insert = mysqli_query($conn,"INSERT INTO messaging (`itemID`, `message`, `receiverID`, `senderID`) VALUES ('$itemID','$buyermessage', '$sellerID', '$buyerID')");
            if(!$insert)  {
                echo mysqli_error();
            }else{
                echo "<br>Message was sent successfully.";
            }
        }

        //<!-- *********************************  Grabs information from Item ID  ******************************* -->   
        if (isset($_GET['id'])) {

            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "SELECT * FROM items WHERE itemID = " . $id;
            $GLOBALS['row_data'] = mysqli_query($conn, $sql);
            $sellerID = $_SESSION['sellerID'];
            $buyerID = $_SESSION['userID'];
        } 
        
        //<!-- *********************************  Error message if you try to message yourself  ******************************* -->   
        if ($sellerID == $buyerID){
            echo "<br><br><br><br><br><br>You cannot message yourself!<br>Atleast not through our application.<br><br><br><br><br><br>";
        }else{
        //<!-- *********************************  Grabs information associated with item and displays it on left side  ******************************* -->   
            $row = $row_data->fetch_assoc();
            ?>
            <div class="small-container">
            <div class="row">
                <div class="col-3" style="text-align:left">
                                <label>Your ID: <?php echo $_SESSION['userID'] ?></label><br>
                                <label>Listing Seller: <?php echo $_SESSION['sellerID'] ?></label><br>
                                <label>Item Listing: <?php echo $row['itemID'] ?></label><br>
                                <label>Item Title: <?php echo $row['title'] ?></label><br>
                                <label>Item Cost: <?php echo $row['price'] ?></label><br>
                                <?php $_SESSION['buyitem'] = $row['itemID']; ?>
                </div>
                <div class="col-3">
                    <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST"> 
                    <br><br><label>Message:</label><br>
                    <textarea id="bmessage" name="bmessage" rows="8" cols="40"></textarea>
                    <input class="btn btn-green" type="submit" value="Send Message">
                    </form>
            </div>
            </div>
        </div>
        
        <?php
        }
        //<!-- *********************************  FOOTER  ******************************* -->   
        include("static/footer.html");
        ?>
    </body>
</html>
<!-- Created by Dan Shields for ICS325 -->