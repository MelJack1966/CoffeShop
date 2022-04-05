<html lang="en">
    <!---------------------------  Added Style for generated table ------------------------------>
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
        <title>FK - User Item Listings</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

    <?php
        session_start();
        include "dynamic/DBController.php";
        $keyword_err = $keyword = "";
        //<!---------------------------  HEADER ------------------------------>
        include "static/header.php";   

        //<!---------------------------  If deleting a listing ------------------------------>
        if(isset($_GET['delList'])){
            $id = mysqli_real_escape_string($conn, $_GET['delList']);
            $sql="DELETE FROM items WHERE itemID = " . $id;
            $sql2= "SELECT * FROM items WHERE itemID = '$id'";
            $row = mysqli_fetch_assoc($result = mysqli_query($conn, $sql2));
            $_filename = $row['filename'];
            unlink("images/" . $_filename);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Listing has been deleted.</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                }
                
        }

        //<!---------------------------  If closing a listing ------------------------------>
        if(isset($_GET['closeList'])){
            $id = mysqli_real_escape_string($conn, $_GET['closeList']);
            $sql="UPDATE items SET status = 3 WHERE itemID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Listing has been closed.</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                }
                
        }

        //<!---------------------------  information from newitems.php ------------------------------>
        if(isset($_GET['upl'])){
            $id = mysqli_real_escape_string($conn, $_GET['upl']);
            if($id == 1) {
                $_SESSION['pagemessage'] = "<p align=center>Upload was successful.</p>";
            } 
                
        }

        //<!---------------------------  If updating a listing status to pending ------------------------------>
        if(isset($_GET['updPend'])){
            $id = mysqli_real_escape_string($conn, $_GET['updPend']);
            $sql="UPDATE items SET status = 2 WHERE itemID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Listing status has been updated.</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
                }
                
        }

        //<!---------------------------  If updating a listing status to active ------------------------------>
        if(isset($_GET['updAct'])){
            $id = mysqli_real_escape_string($conn, $_GET['updAct']);
            $sql="UPDATE items SET status = 1 WHERE itemID = " . $id;
            if ($conn->query($sql) === TRUE) {
                $_SESSION['pagemessage'] = "<p align=center>Listing status has been updated.</p>";
                } else {
                $_SESSION['pagemessage'] = "<p align=center>Error deleting message: " . $conn->error . "</p>";
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
        
    <!---------------------------  Title & New item Button ------------------------------>
    <center>
    <div class="small-container"><br>
        <div class="row">
            <div class="col-2"> 
                <h3 class="title">Your Listings:</h3>
            </div>    
            <div class="col-2"> 
                <a href="newitem.php"><h3 class="btn btn-green">+ New Item?</h3></a>
            </div>    
        </div><br>
    </div>
        

        
            <div class="col-1" > 
 
                <!---------------------------  Generates list of items if user has them ------------------------------>
                <?php
                    $_userID = $_SESSION['userID'];
                    $sql = "SELECT * FROM items WHERE userID = '$_userID'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) >= 1) {
                        ?>
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                        <?php
                        
                        echo "<table action='".htmlspecialchars($_SERVER['PHP_SELF'])."' border='1' text-align:'center'><tr>  <th>Status</th>  <th>Listing #</th>  <th>Listing Title</th>  <th>Price Price</th>  <th>Description</th>  <th>Location</th>  <th>Update Listing</th>  <th>Status Change</th>  <th>Close Listing</th>  <th>Delete Listing</th>  </tr>";
                        while($row    = mysqli_fetch_assoc($result))  {
                            if ($row['status'] == 1){
                                $status = "Active";
                                $_disabled = "";
                            } elseif ($row['status'] == 2) {
                                $status = "Pending";
                                $_disabled = "";
                            } else {
                                $status = "Closed";
                                $_disabled = "disabled";
                            }
                            $_itemID2 = $row['itemID'];
                                echo "<tr>";
                                echo "<td>" . $status . "</td>";
                                echo "<td>" . $row['itemID'] . "</td>";
                                echo "<td><input type=text size=20 id='title$_itemID2' name='title$_itemID2' value='".$row['title']."' ". $_disabled . "></td>";
                                echo "<td><input type=text size=10 name=price$_itemID2 value='".$row['price']."' ". $_disabled . "></td>";
                                echo "<td><input type=text size=50 name=description$_itemID2 value='".$row['description']."' ". $_disabled . "></td>";
                                echo "<td><input type=text size=20 name=location$_itemID2 value='".$row['location']."' ". $_disabled . "></td>";
                                if ($row['status'] == 1){
                                    echo "<td><button type='submit' class='btn2 btn-lblue' formaction='updateList.php?ID=$_itemID2'>Update</button></td>";
                                    echo "<td><a class='btn2 btn-yellow' href='items.php?updPend=".$row["itemID"]."'>To Pending</a></td>";
                                    echo "<td><a class='btn2 btn-red' href='items.php?closeList=".$row["itemID"]."'>Close Listing</a></td>";
                                    echo "<td><a class='btn2 btn-blackred' href='items.php?delList=".$row["itemID"]."'>Delete Listing</a></td>";
                                } elseif ($row['status'] == 2) {
                                    echo "<td><button type='submit' class='btn2 btn-lblue' formaction='updateList.php?ID=$_itemID2'>Update</button></td>";
                                    echo "<td><a class='btn2 btn-green' href='items.php?updAct=".$row["itemID"]."'>To Active</a></td>";
                                    echo "<td><a class='btn2 btn-red' href='items.php?closeList=".$row["itemID"]."'>Close Listing</a></td>";
                                    echo "<td><a class='btn2 btn-blackred' href='items.php?delList=".$row["itemID"]."'>Delete Listing</a></td>";
                                } else {
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td><a class='btn2 btn-blackred' href='items.php?delList=".$row["itemID"]."'>Delete Listing</a></td>";
                                }
                                echo "</tr>";
                        }  // End of while loop
                        echo "</table>";
                        echo "<br><br>";
                    }  // End of IF Result > 0
                ?>
                </form>  </center>
            </div>

    
    <?php
    //<!--------- FOOTER --------->
    include("static/footer.html");
    ?>
</html>
<!-- Created by Dan Shields for ICS325 -->