<?php 
// index.php
session_start();

// Si l'utilisateur est connecté, on récupère son identité via la session.
$identity = null;
if (isset($_SESSION['username'])) {
    $identity = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Page d'accueil</title>
        <link rel="icon" type="image/vnd.icon" href="./img/triforce.ico">
        <link rel="stylesheet" href="./style/style.css">
    </head>
    <body>
        <?php require 'component/header.php'; ?>
        <h1>Page d'accueil</h1>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <strong>Bienvenue, <?= $identity ?></strong> <a href="logout.php">Déconnexion</a>
        

        <?php else: ?>
        <a href="login.php">Connexion</a>
        <?php endif; ?>
        
        <p>
            page d'accueil du site
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
