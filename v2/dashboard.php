<?php 
session_start();

if (!(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
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

        <h1>dashboard</h1>

        <div class="cardContainer">
            <?php require 'component/card.php';
            $compteDesGardiensCard = new Card(
                'compte des gardiens',
                'compte des gardiens img',
                'compteDesGardiens.php',
                'compte des gardiens description'
            );
            $sanctuairesPersonnelsCard = new Card(
                'sanctuaires personnels',
                'sanctuaires personnels img',
                'sanctuairesPersonnels.php',
                'sanctuaires personnels description');
            $ordresEtAlliancesCard = new Card(
                'ordres et alliances',
                'ordres et alliances img',
                'ordresEtAlliances.php',
                'ordres et alliances description');
            ?>
        </div>



        
        <p>variables de session :
        <?php
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
        ?>
        </p>
    </body>
</html>
