<?php 
//header
session_start(); 
if (isset($_SESSION['loggedin'])){
	if ($_SESSION['loggedin'] == 1) { 
		if ($_SESSION['role'] == 1) {
			include("static/header3.html");
		}else {
			include("static/header2.html");
		}
	} else {
		include("static/header1.html");
	}
} else {
	include("static/header1.html");
}  
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FindersKeepers Home</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!---------- Featured Categories ---------->
<div class="categories">
	<div class="small-container">
		<div class="row">
			<h1 class="title">Welcome to FindersKeepers!</h1>
			<p>Your one stop location to buy, sell, trade, and barter with your neighbors and those around you for any item you may want to.</p>
		</div>
	</div>
	
</div>
<!-------- Featured Products --------->
	<div class="small-container">
		<h2 class="title">New Items</h2>
		<div class="row">
			<div class="col-4">
				<img src="images/rug.jpg">
				<h4>rug</h4>
			</div>
			<div class="col-4">
				<img src="images/chair.jpg">
				<h4>Antique Chair</h4>

			</div>
			<div class="col-4">
				<img src="images/rcar1.jpg">
				<h4>Moddafied Car</h4>

			</div>
			<div class="col-4">
				<img src="images/tires.jpg">
				<h4>Boat tires</h4>

			</div>
		</div>
		
		
	</div>

</body>
</html>		

<?php
    //footer
    include("static/footer.html");
?>