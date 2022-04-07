<?php
//Only houses DB Info.  2 sets, used for XAMPP local, and School Site - Should not need to update.

//query included as most functions usually need DB access.
include ("query.php");

//***************************************  SCHOOL SITE ******************************************

DEFINE ('DB_USER', 'ics325fa2113');
DEFINE ('DB_PASSWORD', '8465');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ics325fa2113');


//***************************************  XAMPP ******************************************
/*
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ics325fa2121');
*/


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