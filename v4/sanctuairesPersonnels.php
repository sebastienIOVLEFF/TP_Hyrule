<?php
ob_start();
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
    header('Location: index.php');
    exit;
}

$_SESSION["pageName"] = "Sanctuaires Personnels";
require_once 'service/command_executor.php';
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
    <div class="page-content">
        <h2 style="text-align: center; padding-bottom: 15px;">Outils de gestion des Sanctuaires Personnels :</h2>
        <?php require 'forms/changePermission.php'; ?>
    </div>
    <?php require 'component/terminal.php'; ?>
</body>

</html>