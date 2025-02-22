<?php 
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}

$_SESSION["pageName"] = "Sanctuaires Personnels";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sanctuaires Personnels</title>
        <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <?php require 'component/header.php'; ?>
        
        <p>
            page Sanctuaires Personnels
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
