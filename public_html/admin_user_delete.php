<?php

$id = $_POST['itemid'];

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\">";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>";
echo "<style>";
echo "h1 {";
echo "color: #1E9076;";
echo "text-align: center;";
echo "}";
echo "h2 {";
echo "color: #095C35;";
echo "text-align: center;";
echo "}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h1>Test Delete</h1>";

echo "<h3>ID: $id</h3>";

require_once "dynamic/DBController.php";
$sql = "DELETE FROM users WHERE userID=$id";
$result = mysqli_query($conn, $sql);
$error = mysqli_error($conn);
echo "<h3>Result: $result</h3>";
echo "<h3>Error: $error</h3>";
header("location:adminmanage.php"); 
?>
