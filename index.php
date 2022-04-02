<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'scripts/initialize.php';
    session_start(); //for session variables if we end up using
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>">
    <script src="script.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <title>ChatBot</title>
</head>

<body>
    <div>
        <div id="menu-container">
            <img id="menu" src="img/menu.webp">
        </div>
    </div>

</body>

</html>