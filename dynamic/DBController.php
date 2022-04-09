<?php

//query included as most functions usually need DB access.
include ("query.php");

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ics325fa2113');

//***************************************  XAMPP ******************************************

//Connection used to interact with DB.
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
    echo "Connection failed!";
}
$pdo = null;
try{
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";",DB_USER,DB_PASSWORD);
}
catch(PDOException $E){
    echo $E->getMessage();
    die();
}

?>