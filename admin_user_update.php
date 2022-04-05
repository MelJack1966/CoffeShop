<?php

$id = $_POST['itemid'];
$role_name = "itemrole$id";
$role = $_POST[$role_name];

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
echo "<h1>Test Update</h1>";
echo "<h3>ID: $id</h3>";
echo "<h3>Role10: $role</h3>";

#header("location:adminmanage.php"); 
?>
