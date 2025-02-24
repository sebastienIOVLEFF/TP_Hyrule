<?php
// COMPOSANT DE TEST POUR EXECUTER DES COMMANDES

// Fonction pour exécuter une commande et enregistrer le résultat
function executeCommand($command)
{
    $logFile = __DIR__ . "/../logs/" . $_SESSION['username'] . " - " . $_SESSION['pageName'] . ".log";

    $escapedCommand = escapeshellcmd($command);
    $output = shell_exec($escapedCommand . ' 2>&1');


    // Enregistrer la commande dans le log
    $logEntry = "$ " . $command . "\n" . $output . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);

    return $output;
}

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["command"])) {
    $_SESSION["last_command"] = ["cmd" => $_POST["command"], "output" => executeCommand($_POST["command"])];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!-- Formulaire d'exécution des commandes -->
<form method="post">
    <input type="text" name="command" placeholder="Entrer une commande..." required>
    <button type="submit">Exécuter</button>
</form>