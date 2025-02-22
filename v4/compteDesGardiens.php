<?php 
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}

$_SESSION["pageName"] = "Compte des Gardiens";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Compte des Gardiens</title>
        <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <?php require 'component/header.php'; ?>
        
        <p>
            page Compte des Gardiens
        </p>
        <p>variables de session :
        <?php
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
        ?>
        </p>
    </body>
</html>
