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
    date_default_timezone_set('America/Chicago');
    $date = date('m/d/Y h:i:s a', time());
    $date5 =  date('Y-m-d', strtotime($date. ' + 5 days'));
    $quantity = $_POST['quantity'];
    $transport = $_POST['transport'];
    $furnchoice = $_POST['furnchoice'];
    $membership = $_POST['membership'];
    $uname = $_POST['uname'];
    $uaddress = $_POST['uaddress'];

    switch ($transport){
        case "1":
            $transtext = "You can pickup your furniture on ";
            break;
        case "2":
            $transtext = "Your furniture will be delivered on ";
            break;
        default:
            $transtext = "No Option Selected";   
    }

    switch ($furnchoice) {
        case "1":
            $cost=299.99;
            $description="Bed";
            break;
        case "2":
            $cost=999.99;
            $description="Bed Package";
            break;
        case "3":
            $cost=979.99;
            $description="Big Green Egg - Large";
            break;
        case "4":
            $cost=1399.99;
            $description="Chair";
            break;
        case "5":
            $cost=33.99;
            $description="Lamp";
            break;
        case "6":
            $cost=299.99;
            $description="Love Seat";
            break;
        case "7":
            $cost=409.99;
            $description="Mattress";
            break;
        case "8":
            $cost=349.99;
            $description="Mirror";
            break;
        case "9":
            $cost=399.99;
            $description="3 Piece Rocker Set";
            break;
        case "10":
            $cost=349.99;
            $description="Rug";
            break;
        case "11":
            $cost=319.99;
            $description="Sofa";
            break;
        case "12":
            $cost=499.99;
            $description="Table";
            break;
        case "13":
            $cost=99.99;
            $description="Chair";
            break;
        default:
            $cost=0;
            $description="No Option Selected";
        break;
    }
    /* Cost Variables */
    if ($quantity > 8){
        $quantity2 = $quantity - 8;
        $subtotal = bcdiv((($cost * 8)*.85), 1, 2);
        $subtotal = $subtotal + bcdiv(($cost * $quantity2), 1, 2);
    }
    elseif ($quantity >= 5){
        $subtotal = bcdiv((($cost * $quantity)*.85), 1, 2);
    }
    elseif ($quantity >= 3){
        $subtotal = bcdiv((($cost * $quantity)*.90), 1, 2);
    }
    else{
        $subtotal = bcdiv(($cost * $quantity), 1, 2);
    }
    

    if ($membership == "1"){
        $mcost = 0;
        $mstatus = "Non-Member";
        if($transport == "2"){
            $dcost=49.99;
        }
        else{
            $dcost = 0;
        }
    }
    elseif ($membership == "2"){
        $mstatus = "Member";
        $mcost = 0;
        $dcost = 0;
    }
    else{
        $mstatus = "New Member";
        $mcost = 39.99;
        $dcost = 0;
    }

    $subtotal3 = $subtotal + $mcost + $dcost;
    $subtax = bcdiv(($subtotal3 * .08), 1, 2);
    $total = bcdiv(($subtotal3 + $subtax), 1, 2);

    $myfile = fopen("furnitureorders.txt", "a") or die("Unable to open file!");
    $txt = $uname . "," . $total . "," . $date;
    fwrite($myfile, $txt);
    fclose($myfile);
?>

<!---------- Purchase Order ---------->
    <div class="small-container">
        <h2 class="title">Purchase Order Completed!</h2>
		<div class="row">
            <div class="col-2">
                <?php  echo $description . ": " . "(" . $cost . " x " . $quantity .  ")." ?> <br>
                <?php  echo "Subtotal: $" . number_format($subtotal,2,".",",") . "." ?> <br><br>
                <?php  echo "Additional Costs:" ?> <br>
                <?php  echo "Membership: " . number_format($mcost,2,".",",") . "." ?> <br>
                <?php  echo "Delivery: " . number_format($dcost,2,".",",") . "." ?> <br><br>
                <?php  echo "Subtotal after additional costs: $" . number_format($subtotal3,2,".",",") . "." ?> <br><br>
                <?php  echo "Tax (8%) = $" . number_format($subtax,2,".",".") . "." ?> <br>
                <?php  echo "Total: $" . number_format($total,2,".",",") . "." ?><br><br>
                
                <?php  echo "Order processed: " . $date . "." ?> <br>
                <?php  echo $transtext . $date5 . "." ?><br><br>
            </div>
            <div class="col-2">
            <?php  echo "Name: " . $uname ?> <br>
            <?php  echo "Address: " . $uaddress ?> <br>
            <?php  echo "Membership Status: " . $mstatus ?> <br>
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