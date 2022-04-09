<html lang="en">
    <?php session_start();
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $_SESSION['FullName'];?>'s Profile</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        
        include "dynamic/DBController.php";
        UpdateUserVars($_SESSION['username'],$_SESSION['password']);
        UpdateUserSales($_SESSION['userID']);
        $lastlogin = $_SESSION['lastlogin'];
        
        //<!-- *********************************  HEADER ******************************* -->    
        include "static/header.php";                       
        // Store data in session variables
        
        ?>
        <center>
            <h2><?php echo "<br>Welcome " . $_SESSION['FullName']?></h2>
            <br><br>
        </center>
    
    <!-- *********************************  PROFILE INFORMATION, LEFT SECTION ******************************* -->    
    <div class="small-container">
		<div class="row">
			<div class="col-3">
            <center><h3>Update Profile Information:</h3></center>
                <form method="post" action="#" >
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your First Name" value="<?php echo $_SESSION['fname']; ?>"  />
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lname" style="width:20em;" placeholder="Enter your Last Name" value="<?php echo $_SESSION['lname']; ?>"  />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your Email" value="<?php echo $_SESSION['email']; ?>"  />
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phonenum" style="width:20em;" placeholder="Enter your Phone Number" value="<?php echo $_SESSION['phonenum']; ?>"  />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" style="width:20em;" placeholder="Enter your Fullname" value="**********"  />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" style="width:10em; margin:0;" value="Update"><br><br>
                    </div>
                </form>
            </div>
            
            <?php
                if(isset($_POST['submit'])){
                    $firstname = $_POST['fname'];
                    $lastname = $_POST['lname'];
                    $email = $_POST['email'];
                    $phonenum = $_POST['phonenum'];
                    if ($_POST['password'] == "**********"){
                        $password = $_SESSION['password'];
                    } else {
                        $password = $_POST['password'];
                        $_SESSION['password'] = $password;
                    }
                    $userID = $_SESSION['userID'];
                    $query = "UPDATE users SET fname = '$firstname', lname = '$lastname', email = '$email', phonenum = '$phonenum', password = '$password'
                    WHERE userID = '$userID' ";
                        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            ?>
                
            <script type="text/javascript">
                alert("Update Successful.");
                window.location = "profile.php";
            </script>
            <?php
                }
            ?>

            <!-- *********************************  SITE STATISTICS, RIGHT SECTION ******************************* -->
            <div class="col-3">
                <center><h3>Site Statistics:</h3></center>
                <div class="form-group">
                    <label>Total # of items placed for sale:</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="0" value="<?php echo $_SESSION['uTotal']?>" disabled >
                </div>
                <div class="form-group">
                    <label># of Active Sales</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="0" value="<?php echo $_SESSION['uActive']?>" disabled >
                </div>
                <div class="form-group">
                    <label># of Pending Sales</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="0" value="<?php echo $_SESSION['uPending']?>" disabled >
                </div>
                <div class="form-group">
                    <label># of Closed Sales</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="0" value="<?php echo $_SESSION['uClosed']?>" disabled >
                </div>
                <div class="form-group">
                    <label>Last Login</label>
                    <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="" value=" <?php echo $_SESSION['lastlogin'] ?>" disabled >
                </div><br><br>
            </div>
        </div>
    </div>

        <?php
        //footer
        include("static/footer.html");
        ?>
    </body>
</html>