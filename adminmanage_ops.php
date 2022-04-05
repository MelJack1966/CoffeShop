<?php

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
echo "<h1>Test</h1>";

$opid = $_GET['opid'];
$id = $_GET['item'];
echo "<h3>ID1: $id</h3>";
echo "<h3>OPID: $opid</h3>";

require_once "dynamic/DBController.php";
if ($opid == 1) {
    echo "<h3>Delete call for user id: $id</h3>";
    $sql = "DELETE FROM users WHERE userID = $id";
}
if ($opid == 2) {
    echo "<h3>Update call for user id: $id</h3>";
    $ruleid = $_POST['itemrole'.$id];
    $valueActive = $_POST['itemactive'.$id];
    echo "<h3>User Role: $ruleid</h3>";
    echo "<h3>User Lock: $valueActive</h3>";
    $sql = "UPDATE users SET role = $ruleid, locked = $valueActive WHERE userID = $id";
}
if ($opid == 3) {
    echo "<h3>Delete call for item id: $id</h3>";
    $sql = "DELETE FROM items WHERE itemID = $id";
}
if ($opid == 4) {
    echo "<h3>Update call for item id: $id</h3>";
    $title = $_POST['itemtitle'.$id];
    $description = $_POST['itemdescription'.$id];
    $price = $_POST['itemprice'.$id];
    $location = $_POST['itemlocation'.$id];
    $status = $_POST['itemstatus'.$id];
    echo "<h3>Item Title: $title</h3>";
    echo "<h3>Item Descr: $description</h3>";
    echo "<h3>Item Price: $price</h3>";
    echo "<h3>Item Statu: $status</h3>";
    echo "<h3>Item Locat: $location</h3>";
    $sql = "UPDATE items SET title = '$title', description = '$description', price = '$price', status = $status, location = '$location' WHERE itemID = $id";
}

echo "<h3>SQL Command: $sql</h3>";
$result = mysqli_query($conn, $sql);
$error = mysqli_error($conn);
echo "<h3>SQL Result: $result</h3>";
echo "<h3>SQL Error: $error</h3>";
header("location:adminmanage.php"); 
?>
