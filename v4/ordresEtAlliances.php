<?php
ob_start();
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
    header('Location: index.php');
    exit;
}

$_SESSION["pageName"] = "Ordres et Aliances";
require_once "component/accordion.php";
require_once "service/command_executor.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ordres et Aliances</title>
    <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <?php require_once 'component/header.php'; ?>
    <div class="page-content">
        <h2 style="text-align: center; padding-bottom: 15px;">Outils de gestion des Ordres et Alliances :</h2>
        <?php $accordion = new Acc(['changeGroup.php']); ?>
    </div>
    <?php require_once 'component/terminal.php'; ?>
</body>

</html>