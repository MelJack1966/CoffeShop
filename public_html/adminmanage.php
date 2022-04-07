<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FindersKeepers Home</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding-left: 20px;
                padding-right: 30px;  
            }
            tr:nth-child(even) {
                background-color: #D6EEEE;
            }            
        </style>
    </head>
    <body>
        <?php
        //header
            session_start();
            include "dynamic/DBController.php";
            UpdateUserVars($_SESSION['username'],$_SESSION['password']);    
            $lastlogin = $_SESSION['lastlogin'];
            include "static/header.php";
            
        ?>
        <center>
            <h2><?php echo "Hi " . $_SESSION['FullName']?></h2>
            <br><br>
        </center>

        <!-- *********************************  Edit Users ******************************* -->    
        <div class="small-container">
            <div class="row">
                <!--<div class="col-3">-->
                <center><h3>Change  User Roles:</h3></center>
                <form action="adminmanage.php" method=POST >
                <table>
                <th>Username</th>
                <th>First</th>
                <th>Last</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Access</th>
                <th>Delete</th>
                <th>Update</th>
                <?php
                    $sql="select * from users";
                    foreach($pdo->query($sql) as $row){
                        $userItem=$row['userID'];
                        echo "<tr>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["fname"]."</td>";
                        echo "<td>".$row["lname"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td>".$row["phonenum"]."</td>";
                        # role change dropdown
                        $dropdown_list = "<select name=itemrole$userItem>";
                        if ($row["role"] == 0) {
                            $dropdown_list .= "<option value=0 selected=selected>User</option>";
                            $dropdown_list .= "<option value=1>Admin</option>";
                        } else {
                            $dropdown_list .= "<option value=0>User</option>";
                            $dropdown_list .= "<option value=1 selected=selected>Admin</option>";
                        }
                        $dropdown_list .= '</select>';
                        echo "<td> $dropdown_list </td>";
                        # activation change dropdown
                        $dropdown_active = "<select name=itemactive$userItem>";
                        if ($row["locked"] == 0) {
                            $dropdown_active .= "<option value=0 selected=selected>Active</option>";
                            $dropdown_active .= "<option value=1>Locked</option>";
                        } else {
                            $dropdown_active .= "<option value=0>Active</option>";
                            $dropdown_active .= "<option value=1 selected=selected>Locked</option>";
                        }
                        $dropdown_active .= '</select>';
                        echo "<td> $dropdown_active </td>";
                        echo "<input type=hidden name=itemid1 value=$userItem >";
                        echo "<td><input type=submit name=delete$userItem formaction='adminmanage_ops.php?opid=1&item=$userItem' value='Delete'</td>";
                        echo "<td><input type=submit name=update$userItem formaction='adminmanage_ops.php?opid=2&item=$userItem' value='Update'</td>";
                        echo "</tr>";
                    }

                ?>
                </table>    
                </form>
            <!-- </div>-->
            </div>
        </div>
        
        </br>
        </br>
            
        <!-- *********************************  Edit Items ******************************* -->    
        <div class="small-container">
            <div class="row">
                <!--<div class="col-3">-->
                <center><h3>Manage Items:</h3></center>
                <form action="adminmanage.php" method=POST >
                <table>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Status</th>
                <th>Location</th>
                <th>File Name</th>
                <th>Delete</th>
                <th>Update</th>
                <?php
                    $sql="select * from items";
                    foreach($pdo->query($sql) as $row){
                        $itemID=$row['itemID'];
                        echo "<tr>";
                        echo "<td><input type=text name=itemtitle$itemID value='".$row["title"]."'</td>";
                        echo "<td><input type=text name=itemdescription$itemID value='".$row["description"]."'</td>";
                        echo "<td><input type=text name=itemprice$itemID value='".$row["price"]."'</td>";
                        $dropdown_status = "<select name=itemstatus$itemID>";
                        if ($row["status"] == 1) {
                            $dropdown_status .= "<option value=1 selected=selected>Active</option>";
                            $dropdown_status .= "<option value=2>Pending</option>";
                            $dropdown_status .= "<option value=3>Closed</option>";
                        } elseif ($row["status"] == 2) {
                            $dropdown_status .= "<option value=1>Active</option>";
                            $dropdown_status .= "<option value=2 selected=selected>Pending</option>";
                            $dropdown_status .= "<option value=3>Closed</option>";
                        } elseif ($row["status"] == 3) {
                            $dropdown_status .= "<option value=1>Active</option>";
                            $dropdown_status .= "<option value=2>Pending</option>";
                            $dropdown_status .= "<option value=3 selected=selected>Closed</option>";                            
                        } else {
                            $dropdown_status .= "<option value=1>Active</option>";
                            $dropdown_status .= "<option value=2>Pending</option>";
                            $dropdown_status .= "<option value=3>Closed</option>";
                            $dropdown_status .= "<option value=4 selected=selected>Undefined</option>";
                        }
                        $dropdown_status .= '</select>';
                        echo "<td> $dropdown_status </td>"; 
                        echo "<td><input type=text name=itemlocation$itemID value='".$row["location"]."'</td>";
                        echo "<td>".$row["filename"]."</td>";
                        echo "<input type=hidden name=itemid2 value=$itemID >";
                        echo "<td><input type=submit name=delete$itemID formaction='adminmanage_ops.php?opid=3&item=$itemID' value='Delete'</td>";
                        echo "<td><input type=submit name=update$itemID formaction='adminmanage_ops.php?opid=4&item=$itemID' value='Update'</td>";
                        echo "</tr>";
                    }

                ?>
                </table>    
                </form>
            <!-- </div>-->
            </div>
        </div>

        </br>
        </br>

        <?php
            //footer
            include("static/footer.html");
        ?>
    </body>
</html>