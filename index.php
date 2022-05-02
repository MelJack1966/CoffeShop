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
	<title>CofeeBot Home</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="script.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</head>
<body>
<!--<script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> --->
<!---------- Featured Categories ---------->
<div class="Backgrounddiv">

	<div class="small-container">
	<h2 class="title">Welcome CoffeeBot!</h2>
		<div class="row">
			
			<p>The best energy for the day starts with the coffee Aroma.</p>
			
	</div>
	<div class="row">
			
			<div class="col-6">
				<img src="images/menu.png">
	</div>
		</div>
	</div>
	<br><br><br><br>



<!-------- Featured Products --------->
	
</div>
</body>
</html>		

<?php
    //footer
    include("static/footer.html");
?>