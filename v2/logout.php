<?php 
// logout.php
session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['id']);
unset($_SESSION['username']);
header('Location: index.php');
exit;
?>