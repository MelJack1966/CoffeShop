<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dan's HOM Knockoff Site - Purchase</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--------- HEADER > --------->    
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="images/logo.png" width="125px">
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="Index.html">Home</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Accounts</a></li>
                </ul>
            </nav>
            <img src="images2/cart.png" width="30px" height="30px">
            <img src="images2/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        
    </div>
</div>
<!--------- < HEADER ---------> 

<?php
    /*  Variable Initialization */
    $furnchoice = $_POST['furnchoice'];
    $ureview = $_POST['ureview'];
    $urating = $_POST['urating'];
    $description = "";
    $ureview2 = str_replace(["awful","abominable","dreadful","foul"],"pretty bad",$ureview);
    switch ($furnchoice) {
        case "1":
            $description="Bed";
            break;
        case "2":
            $description="Bed Package";
            break;
        case "3":
            $description="Big Green Egg - Large";
            break;
        case "4":
            $description="Chair";
            break;
        case "5":
            $description="Lamp";
            break;
        case "6":
            $description="Love Seat";
            break;
        case "7":
            $description="Mattress";
            break;
        case "8":
            $description="Mirror";
            break;
        case "9":
            $description="3 Piece Rocker Set";
            break;
        case "10":
            $description="Rug";
            break;
        case "11":
            $description="Sofa";
            break;
        case "12":
            $description="Table";
            break;
        case "13":
            $description="Chair";
            break;
        default:
            $description="No Option Selected";
        break;
    }

?>

<!---------- Purchase Order ---------->
    <div class="small-container">
        <h2 class="title">Review Completed!</h2>
		<div class="row">
            <div class="col-2">
                <?php  echo "Item Reviewed: " . $description ?> <br>
                <?php  echo "Rating: " . $urating ?> <br>
                <?php  echo "Review: " . $ureview2 ?> <br><br><br>
            </div>

        </div>
    </div> 

<!--------- FOOTER > --------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download our App</h3>
                <p>Download App for Android and IOS mobile phone</p>
                <div class="app-logo">
                    <img src="images/play-store.png">
                    <img src="images/app-store.png">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="images/logo.png">
                <p>My purpose is to make a fake website that uses images from HOM furniture for ICS 325.  In no way is this a real site, and you should treat this as such.</p>
            </div>
            <div class="footer-col-3">
                <h3>Useful links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follor Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>YouTube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2021 - Dan's HOM Knockoff</p>
    </div>
</div>
<!--------- < FOOTER --------->

</body>
</html>