<?php
ob_start();
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
    header('Location: index.php');
    exit;
}

$_SESSION["pageName"] = "Compte des Gardiens";



if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["command"])) {
    $command = escapeshellcmd($_POST["command"]);
    $output = shell_exec($command);
}

require_once 'service/command_executor.php';
require_once 'service/fetch_data_service.php';
require_once 'service/regex.php';
$_SESSION["groups"] = getGroups();
$_SESSION["users"] = getUsers();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Compte des Gardiens</title>
    <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <?php require_once 'component/header.php'; ?>
    <div class="page-content">
        <h2 style="text-align: center; padding-bottom: 15px;">Outils de gestion des Gardiens :</h2>


        <?php require_once 'component/accordion.php'; ?>
        <?php $accordion = new Acc(['addguardianform.php', 'delGuardianForm.php', 'updateGuardianForm.php', 'TESTform.php']); ?>


    </div>
    <?php require_once 'component/terminal.php'; ?>
</body>

</html>