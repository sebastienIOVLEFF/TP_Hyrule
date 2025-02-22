<?php
// Initialize the session
session_start();
 

$_SESSION["loggedin"] = true;
$_SESSION["username"] = 'username';


header("location: dashboard.php");
exit
?>