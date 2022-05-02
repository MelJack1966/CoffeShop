<?php


function UpdateUserVars($username, $password){
    //Is used to set the initial variables and if the user updates their information.
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['phonenum'] = $row['phonenum'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['userID'] = $row['userID'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['FullName'] = $_SESSION['fname'] . " " . $_SESSION['lname'];
    $_SESSION['loggedin'] = 1;        
    //Checks if the lastlogin has been set, if not, sets it - used for Last Login on profile page
    if (!isset($_SESSION['lastlogin'])) {
        $_SESSION['lastlogin'] = $row['lastlogin'];
    }
}

function LoginUpdate($userID){
    //Used to update the last login information for user profile - should only run on login.
    global $conn;
    $query = "UPDATE users SET lastlogin = now() WHERE userID = '$userID' ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
}

/**
 * fetch menu items from db
 */
function get_items($type)
{
    global $db;
    $items = array();
    $sql = "";

    //this would have been where the query would be modified depending on the 'type' arg
    // but this schema doesn't have a type attribute
    if($type == "food") {
        //get food items
    } else if ($type == "drink") { 
        //get drinks
    }

    $sql = "SELECT menu.name, menu.price, menu.size FROM menu";
    //echo $sql;

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $db->error . ']');
    }
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    return $items;
}