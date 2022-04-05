<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fk - Register New User</title>
    <link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .divider{
        width:50px;
        height:auto;
        display:inline-block;
    }
</style>

<?php
    // Include config file
    require_once "dynamic/DBController.php";
    session_start(); 
        if (isset($_SESSION['loggedin'])){
            if ($_SESSION['loggedin'] == 1) { 
                header("location: profile.php");
                } else {
                include("static/header.php");
                }
        } else {
            include("static/header.php");
        }  
?>
 
<body><center>
    <div class="small-container2"><br>
        <div class="col-2">
            <h1 class="title">Account Locked</h1>
            <p>Your account has been locked for one of the following reasons:</p><br>
        </div>
    </div></center>  
    <div class="row">
        <div class="small-container2">
            <ol >
                <li>Inappropriate username</li>    
                <li>Inappropriate listings / Fake Listings</li>
                <li>Harassing users</li>
                <li>Failing to follow through with sales</li>
            </ol> <br><br><br><br>
        </div>    
    </div>  
    <div class="small-container"><center>
        <div class="col-2">
            <p style="font-size: 14px;">You can email accountunlock@finderskeepers.com if you would like to attempt to reinstate your account, please note that if the reason your account was locked was due to #1, then you will need to create a new account.</p><br>
        </div><br>
    </div></center>
</body>
<?php 
    include("static/footer.html");
?>
</html>

<!-- Created by Dan Shields for ICS325 -->