<?php
//<!-- *********************************  Destroys / Unsets Session ******************************* -->  
    session_start();
    header("location: login.php");
    session_unset();
    session_destroy();
?>

<!-- Created by Dan Shields for ICS325 -->