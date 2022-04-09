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
    $_SESSION['locked'] = $row['locked'];
    //Checks if the lastlogin has been set, if not, sets it - used for Last Login on profile page
    if (!isset($_SESSION['lastlogin'])) {
        $_SESSION['lastlogin'] = $row['lastlogin'];
    }
}
function UpdateUserSales($userID){
    //Is used to set the initial variables and if the user updates their information.
    global $conn;
    $sql = "SELECT * FROM items WHERE userID='$userID'";
    $result = mysqli_query($conn, $sql);
    $uActive = $uPending = $uClosed = $uTotal = 0;    
    if (mysqli_num_rows($result) >= 1) {
        while($row    = mysqli_fetch_assoc($result)) {
            if ($row['status'] == 1) {
                $uActive = $uActive + 1;
            } elseif ($row['status'] == 2) {
                $uPending = $uPending + 1;
            } elseif ($row['status'] == 3) {
                $uClosed = $uClosed + 1;
            }
        }
        $_SESSION['uTotal'] = $uActive + $uPending + $uClosed;
        $_SESSION['uActive'] = $uActive;
        $_SESSION['uPending'] = $uPending;
        $_SESSION['uClosed'] = $uClosed;
    }    

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


?>