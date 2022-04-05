<?php 
    //<!-- *********************************  Grabs credentials and validates user is valid ******************************* -->  
    session_start(); 
    include "dynamic/DBController.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        if (empty($username)) {
            header("Location: login.php?error= Username is required");
            exit();
        }else if(empty($password)){
            header("Location: login.php?error= Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $username = strtolower($username);
                $dbusername = strtolower($row['username']);
                //if ($row['username'] === $username && $row['password'] === $password) {
                if ($username === $dbusername && $row['password'] === $password) {
                    UpdateUserVars($username, $password);
                    $userID = $_SESSION['userID'];
                    LoginUpdate($userID);
                    header("Location: profile.php");
                    exit();
                }else{
                    header("Location: login.php?error=Incorrect username or password");
                    exit();
                }
            }else{
                header("Location: login.php?error=Incorrect username or password");
                exit();
            }
        }
    }else{
        header("Location: login.php");
        exit();
    }
?>

<!-- Created by Dan Shields for ICS325 -->