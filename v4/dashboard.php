<?php 
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}

$_SESSION["pageName"] = "Hyrule";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>dashboard</title>
        <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body class="dashboard">

        <?php require 'component/header.php'; ?>

        <div class="cardContainer">
            <?php require 'component/card.php';
            $compteDesGardiensCard = new Card(
                'compte des gardiens',
                'img/compteDesGardiens.webp',
                'compteDesGardiens.php',
                'compte des gardiens description');
            $sanctuairesPersonnelsCard = new Card(
                'sanctuaires personnels',
                'img/sanctuairesPersonnels.webp',
                'sanctuairesPersonnels.php',
                'sanctuaires personnels description');
            $ordresEtAlliancesCard = new Card(
                'ordres et alliances',
                'img/ordresEtAlliances.webp',
                'ordresEtAlliances.php',
                'ordres et alliances description');
            ?>
        </div>
    </body>
</html>
