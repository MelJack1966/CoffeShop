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

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
            $username_err = "Usernames can only contain letters, numbers, and underscores.";
        } else{
            // Prepare a select statement
            $user_name = trim($_POST["username"]);
            $sql = "SELECT * FROM users WHERE username = '$user_name'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) >= 1) {
                $username_err = "This username is already taken.";
            }
        }
        
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if( $password != $confirm_password){
                $confirm_password_err = "Confirmation password does not match.";
                $confirm_password = "";
            }
        }

        
        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            $user_name = trim($_POST["username"]);
            $user_pass = trim($_POST["password"]);
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (username, password) VALUES ('$user_name', '$user_pass')";
            if (mysqli_query($conn, $sql)) {
                header("location: login.php?created=User account has been created! Welcome " . $user_name);
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }         
        }
        
        // Close connection
        mysqli_close($conn);
    }
?>
 
<body><center>
    <div class="small-container2">
        <div class="col-2">
            <h1 class="title">Register</h1>
            <p>Please fill this form to create an account.</p><br>
        </div>
    </div>  
    <div class="row">
        <div class="small-container2">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
                <!-- USERNAME  -->
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>
                <p style="text-align: center; color: red; font-size: 12px" id="username_err"><?php echo $username_err; ?></p>
                
                <!-- PASSWORD  -->
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                </div>
                <p style="text-align: center; color: red; font-size: 12px" id="password_err"><?php echo $password_err; ?></p>

                <!-- PASSWORD CONFIRMATION  -->
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                </div>
                <p style="text-align: center; color: red; font-size: 12px" id="confirm_password_err"><?php echo $confirm_password_err; ?></p>
                
                <!-- SUBMIT BUTTON  -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <div class="divider"></div>
                    <input type="reset" class="btn btnm btn-dblue" value="Reset">
                </div>
                <a href="login.php" class="btn btn-green">Already have an account?</a></center><br>
            </form>
        </div>    
    </div>  
</body>
<?php 
    include("static/footer.html");
?>
</html>

<!-- Created by Dan Shields for ICS325 -->