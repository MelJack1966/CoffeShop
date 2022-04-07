<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FK - Login</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
    //<!-- *********************************  HEADER ******************************* -->   
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
    <!-- *********************************  TITLE ******************************* -->   
    <div class="small-container2">
        <div class="col-2"> 
            <h1 class="title">Login</h1>
            <p>Please fill in your credentials to login.</p>
        </div>    
    </div>

    <!-- *********************************  Moves Credentials to login2.php to run login function ******************************* -->   
    <div class="row">
        <div class="small-container2">
            <form action="login2.php" method="post">
                <?php 
                    if (isset($_GET['error'])) { 
                ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" name="username" placeholder="User Name" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password" class="form-control"><br> 
                </div><br>
                <div class="form-group">
                <button type="submit" class="btn btn-green">Login</button>
                    <p>Don't have an account? <button onclick="location.href='register.php'" type="button" class="btn btn-primary" >Register</button>.</p><br>        
                </div>                
            </form>
        </div>
    </div>
    </center></body>
    <!-- *********************************  FOOTER  ******************************* -->   
	<?php
        include("static/footer.html");
    ?>
    
</html>

<!-- Created by Dan Shields for ICS325 -->