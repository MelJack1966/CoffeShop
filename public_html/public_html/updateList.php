        <?php

            session_start();
            include "dynamic/DBController.php";

            if(isset($_GET['ID'])){
                $id = mysqli_real_escape_string($conn, $_GET['ID']);
                $ititle=$_POST["title".$id];
                $idescription=$_POST["description" . $id];
                $ilocation=$_POST["location" . $id];
                $iprice=$_POST["price" . $id];
                $sql="UPDATE items SET 
                    `title` = '$ititle', 
                    `description` = '$idescription', 
                    `location` = '$ilocation', 
                    `price` = '$iprice' 
                    WHERE itemID = " . $id;
                echo $sql . "<br>";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['pagemessage'] = "<p align=center>Listing has been updated.</p>";
                    header("Refresh:0; url=items.php");
                  } else {
                    $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                  }
                  
            }
    ?>
