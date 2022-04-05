<html lang="en">
<!-- *********************************  Added styling for generated table ******************************* -->   
<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    }
    th, td {
    padding: 5px 15px;
    text-align: center;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK - User Messages</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <?php
        //<!-- ********************************* HEADER ******************************* -->   
        session_start();
        include "dynamic/DBController.php";
        $keyword_err = $keyword = "";
        include "static/header.php";

        //<!-- *********************************  Deletes Message ******************************* -->   
        if(isset($_GET['delete'])){
            $id = mysqli_real_escape_string($conn, $_GET['delete']);
            $sql="DELETE FROM messaging WHERE messageID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Message deleted successfully</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                }
        }

        //<!-- *********************************  Marks Message as Read ******************************* -->   
        if(isset($_GET['read'])){
            $id = mysqli_real_escape_string($conn, $_GET['read']);
            $sql="UPDATE messaging SET status = 1 WHERE messageID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Message updated successfully</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>!!!!! Error updating message: " . $conn->error . "</p>";
                }     
        }

        //<!-- *********************************  Marks Message as Unread ******************************* -->   
        if(isset($_GET['unread'])){
            $id = mysqli_real_escape_string($conn, $_GET['unread']);
            $sql="UPDATE messaging SET status = 0 WHERE messageID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Message updated successfully</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>!!!! Error updating message: " . $conn->error . "</p>";
                }
        }

        //<!---------------------------  Displays an error message at the top, otherwise a placeholder ------------------------------>
        echo "<br>";
        if(!isset($_SESSION['pagemessage'])){
            $_SESSION['pagemessage'] = "";
        }
        echo $_SESSION['pagemessage'];
        $_SESSION['pagemessage'] = "";
    ?>

    <!-- *********************************  TITLE ******************************* -->   
    <div class="small-container2">
        <div class="col-1"> 
            <h1 class="title">Received Messages:</h1>
            
        </div>    
    </div>
    <center>
    
        <div class="col-1" > 
<?php

        //<!-- *********************************  Generates Table for Received Messages ******************************* -->   
        $receiverID = $_SESSION['userID'];
        $sql = "SELECT * FROM messaging WHERE receiverID = '$receiverID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >= 1) {
            ?>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <?php
            echo "<table border='1' text-align:'center'><tr>  <th style='width: 100px'>Status</th>  <th>Listing #</th>  <th>Listing Title</th>  <th>Listing Price</th>  <th>Sender ID</th>  <th style='width: 600px'>Message</th>  <th>Change Status</th>  <th>Reply</th>  <th>Delete Message</th>  </tr>";
            while($row    = mysqli_fetch_assoc($result))  {
                $_itemID = $row['itemID'];
                $sql2 = "SELECT * FROM items WHERE itemID = '$_itemID'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                if ($row['status'] == 0){
                    $status = "Unread";
                    echo "<tr>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . $row['itemID'] . "</td>";
                    echo "<td>" . $row2['title'] . "</td>";
                    echo "<td>" . $row2['price'] . "</td>";
                    echo "<td>" . $row['senderID'] . "</td>";
                    echo "<td>" . $row['message'] . " </td>";
                    echo "<td><a class='btn2 btn-green' href='messages.php?read=".$row["messageID"]."'>Read</a></td>";
                    echo "<td><a class='btn2 btn-orange' href='messages_reply.php?id=".$row["messageID"]."'>Reply</a></td>";
                    echo "<td><a class='btn2 btn-red' href='messages.php?delete=".$row["messageID"]."'>Delete</a></td>";
                    echo "</tr>";
                } elseif ($row['status'] == 1) {
                    $status = "Read";
                    echo "<tr>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . $row['itemID'] . "</td>";
                    echo "<td>" . $row2['title'] . "</td>";
                    echo "<td>" . $row2['price'] . "</td>";
                    echo "<td>" . $row['senderID'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td><a class='btn2 btn-yellow' href='messages.php?unread=".$row["messageID"]."'>Unread</a></td>";
                    echo "<td><a class='btn2 btn-orange' href='messages_reply.php?id=".$row["messageID"]."'>Reply</a></td>";
                    echo "<td><a class='btn2 btn-red' href='messages.php?delete=".$row["messageID"]."'>Delete</a></td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td>You have no messages.</td><br><br>";
                    echo "</tr>";
                }  //End of IF Statuses
            }  //End of WHILE loop
            echo "</table>";
            echo "<br><br>";
        }  //END of IF results > 0

    ?>
        </form>
    
            <div class="row">
                <div class="small-container2">
                    <div class="col-1"> 
                        <h1 class="title">Sent Messages:</h1><br>
                    </div>    
                </div>
                <div class="col-1">
                <?php

                    //<!-- *********************************  Generates Table for Received Messages ******************************* -->   
                    $senderID = $_SESSION['userID'];
                    $sql = "SELECT * FROM messaging WHERE senderID = '$senderID'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) >= 1) {
                        ?>
                        
                        <?php
                        echo "<table border='1' text-align:'center'><tr>  <th style='width: 100px'>Status</th>  <th>Listing #</th>  <th>Listing Title</th>  <th>Listing Price</th>  <th>Sender ID</th>  <th style='width: 800px'>Message</th> </tr>";
                        while($row    = mysqli_fetch_assoc($result))  {
                            $_itemID = $row['itemID'];
                            $sql2 = "SELECT * FROM items WHERE itemID = '$_itemID'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            if ($row['status'] == 0){
                                $status = "Unread";
                            } elseif ($row['status'] == 1) {
                                $status = "Read";
                            }
                                echo "<tr>";
                                echo "<td>" . $status . "</td>";
                                echo "<td>" . $row['itemID'] . "</td>";
                                echo "<td>" . $row2['title'] . "</td>";
                                echo "<td>" . $row2['price'] . "</td>";
                                echo "<td>" . $row['senderID'] . "</td>";
                                echo "<td>" . $row['message'] . " </td>";
    
                                echo "</tr>";

                            
                        }  //End of WHILE loop
                        echo "</table>";
                        echo "<br><br>";
                    }  //END of IF results > 0

                    ?>
                    
                </div>
            </div>
            </center>
        </div>
<?php

    //<!-- *********************************  FOOTER  ******************************* -->   
    include("static/footer.html");
    ?>
</html>
<!-- Created by Dan Shields for ICS325 -->