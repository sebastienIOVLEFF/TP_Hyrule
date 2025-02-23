<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["command"])) {
    $command = escapeshellcmd($_POST["command"]); // Sécurisation de base
    $output = shell_exec($command);

    // Enregistrer la commande pour l'afficher plus tard dans le terminal
    $_SESSION["last_command"] = ["cmd" => $_POST["command"], "output" => $output];

    // Rediriger vers la page de commandes
    header("Location: commands.php");
    exit;
}
?>
