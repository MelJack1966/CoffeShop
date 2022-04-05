<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dan's HOM Knockoff Site</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!---------- header ---------->	
	<div class="header">
		<div class="container">
			<div class="navbar">
				<div class="logo">
					<img src="images/logo.png" width="125px">
				</div>
				<nav>
					<ul id="MenuItems">
						<li><a href="">Home</a></li>
						<li><a href="">Products</a></li>
						<li><a href="">About</a></li>
						<li><a href="">Contact</a></li>
						<li><a href="">Accounts</a></li>
					</ul>
				</nav>
				<img src="images2/cart.png" width="30px" height="30px">
				<img src="images2/menu.png" class="menu-icon" onclick="menutoggle()">
			</div>
			<div class="row">
				<div class="col-2">
					<h1>Give yourself something to dive in to!</h1>
					<p>Great leaps don't need to start outside the house.</p>
					
				</div>
				<div class="col-2">
					<img src="images/dive.jpg">
				</div>
			</div>
		</div>
	</div>

<!---------- Featured Categories ---------->
	<div class="categories">
		<div class="small-container">
			<div class="row">
				<div class="col-3">
					<img src="images/disp1.jpg">
				</div>
				<div class="col-3">
					<img src="images/disp2.jpg">
				</div>
				<div class="col-3">
					<img src="images/disp3.jpeg">
				</div>
			</div>
		</div>
		
	</div>

<!-------- Featured Products --------->
<?php
$furniture = array("Big Green Egg" => 979.99, "3 Piece Rocker" => 399.99, "Table" => 499.99, "Sofa" => 319.99, "Love Seat" => 299.99, "Mattress" => 409.99, "Mirror" => 349.99, "Rug" => 349.99, "Bed" => 299.99, "Bed Package" => 999.99, "Chair" => 1399.99, "Lamp" => 33.99);

?>

	<div class="small-container">
		<h2 class="title">Featured Products</h2>
		<div class="row">
			<div class="col-4">
				<img src="images/bed299.jpg">
				<h4>Bed</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>$299.99</p>
			</div>
			<div class="col-4">
				<img src="images/bedpackage999.jpg">
				<h4>Bed Package</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$999.99</p>
			</div>
			<div class="col-4">
				<img src="images/chair1399.jpg">
				<h4>Chair</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$1,399.99</p>
			</div>
			<div class="col-4">
				<img src="images/lamp33.jpg">
				<h4>Lamp</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$33.99</p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-4">
				<img src="images/loveseat299.jpg">
				<h4>Love Seat</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>$299.99</p>
			</div>
			<div class="col-4">
				<img src="images/mattress409.jpg">
				<h4>Mattress</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$409.99</p>
			</div>
			<div class="col-4">
				<img src="images/mirror349.jpg">
				<h4>Mirror</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$349.99</p>
			</div>
			<div class="col-4">
				<img src="images/rug349.jpg">
				<h4>Rug</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$349.99</p>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<img src="images/sofa319.jpg">
				<h4>Sofa</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
				</div>
				<p>$319.99</p>
			</div>
			<div class="col-4">
				<img src="images/table499.jpg">
				<h4>Table</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-half-o"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$499.99</p>
			</div>
			<div class="col-4">
				<img src="images/rockerset399.jpg">
				<h4>3 Piece Rocker Set</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$399.99</p>
			</div>
			<div class="col-4">
				<img src="images/biggreen979.jpg">
				<h4>Big Green Egg - Large</h4>
				<div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div>
				<p>$979.99</p>
			</div>
			<a href="Purchase.html" class="btn">Purchase! &#8594;</a>
			<a href="Review.html" class="btn">Review! &#8594;</a>
		</div>
	</div>

    <?php
        echo "Sorted Array <br>" ;
        
        ksort($furniture);
        foreach ($furniture as $key => $val) {
            echo "$key = $val <br>";
        }
    ?>

	
<!--------- FOOTER --------->
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
					<h3>Follow Us</h3>
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

<!------  JS for Toggle Menu ------------>
	<script>
		var MenuItems = document.getElementById("MenuItems");
		MenuItems.style.maxHeight = "0px";
	
		function menutoggle(){
			if(MenuItems.style.maxHeight == "0px")
				{
					MenuItems.style.maxHeight = "200px"
				}
			else
				{
					MenuItems.style.maxHeight = "0px"
				}
		}
	</script>

</body>
</html>		
		