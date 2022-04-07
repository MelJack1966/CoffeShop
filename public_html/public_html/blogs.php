<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fk - Blogs</title>
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
    include("static/header.php");
?>
 
<body><center>
    <div class="small-container2"><br>
        <div class="col-2">
            <h1 class="title">Blogs</h1>
            <p>Blogs of Finders Keepers</p><br>
        </div><br>
    </div>
    <div class="row">
        <div class="small-container">
            <ul>
                <li><p>Today we sold some things.</p></li> <br>
                <li><p>Today we sold some more things.</p></li>  <br>
                <li><p>Same day different sales.</p></li>  <br>
           
            </ul> <br><br><br><br>
        </div>    
    </div>  

</body></center>  
<?php 
    include("static/footer.html");
?>
</html>

<!-- Created by Dan Shields for ICS325 -->