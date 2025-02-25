<?php
// COMPOSANT DE TEST POUR EXECUTER DES COMMANDES

// Fonction pour exécuter une commande et enregistrer le résultat
function executeCommand($command)
{
    //execution
    $escapedCommand = escapeshellcmd($command);
    $output = shell_exec($escapedCommand . ' 2>&1');
    //logging
    logCommand($command, $output);
    return $output;
}

function logCommand($command, $output)
{
    $logFile = __DIR__ . "/../logs/" . $_SESSION['username'] . " - " . $_SESSION['pageName'] . ".log";

    // Enregistrer la commande dans le log
    $logEntry = "$ " . $command . "\n" . $output . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
