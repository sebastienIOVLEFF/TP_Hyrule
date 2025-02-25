<?php
ob_start();
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
    header('Location: index.php');
    exit;
}

$_SESSION["pageName"] = "Ordres et Aliances";

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
        <p>
            page Ordres et Aliances
        </p>
    </div>
    <?php require_once 'component/terminal.php'; ?>
</body>

</html>