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

	<?php 
		//<!---------- Header ---------->
		include "dynamic/DBController.php";
		session_start(); 
		include "static/header.php";
	?>

	<!---------- TITLE ---------->
	<div class="categories">
		<div class="small-container">
			<div class="row">
				<h1 class="title">Welcome to FindersKeepers!</h1>
				<p>Your one stop location to buy, sell, trade, and barter with your neighbors and those around you for any item you may want to.</p>
			</div>
		</div>
	</div>

	<!-------- Active Listing - 4 randomly active listing --------->
	<div class="small-container">
		<center><h3 class="title">Active Listings</h3>
		<div class="row">
			<?php
				$sql="select title, itemID, filename from items where status=1 order by rand() limit 4";
				foreach($pdo->query($sql) as $row){
					echo '<div class="col-4">';
					echo '<a href="display_item.php?id='.$row["itemID"].'"><img src="images/'.$row['filename'].'" style="width:250px;height: 250px;"></a>';
					echo '<h4>'.$row['title'].'</h4>';
					echo '</div>';
				}
			?>	
		</div>
		</center>
	</div>

	<?php
		//<!-------- FOOTER --------->
		include("static/footer.html");
	?>
</body>
</html>	

<!-- Created by Dan Shields & Jose Labastida for ICS325 -->