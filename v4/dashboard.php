<?php 
session_start();

if (!(isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>dashboard</title>
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body class="dashboard">

        <?php require 'component/header.php'; ?>

        <div class="cardContainer">
            <?php require 'component/card.php';
            $compteDesGardiensCard = new Card(
                'compte des gardiens',
                'compteDesGardiens.webp',
                'compteDesGardiens.php',
                'compte des gardiens description');
            $sanctuairesPersonnelsCard = new Card(
                'sanctuaires personnels',
                'sanctuairesPersonnels.webp',
                'sanctuairesPersonnels.php',
                'sanctuaires personnels description');
            $ordresEtAlliancesCard = new Card(
                'ordres et alliances',
                'ordresEtAlliances.webp',
                'ordresEtAlliances.php',
                'ordres et alliances description');
            ?>
        </div>
    </body>
</html>
