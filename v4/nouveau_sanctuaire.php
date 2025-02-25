<?php
ob_start();


if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
    header('Location: index.php');
    exit;
}

$_SESSION["pageName"] = "nouveau_sanctuaire";

?>

<!DOCTYPE html>
<html>

<head>
    <title>nouveau_sanctuaire</title>
    <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <?php require_once 'component/header.php'; ?>   
   
    <div class="page-content">
        <?php require 'nouveau_sanctuaire.php'; ?>
    </div>
    <?php require 'component/terminal.php'; ?>
</body>

</html>