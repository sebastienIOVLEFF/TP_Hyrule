<?php
// COMPOSANT DE TEST POUR EXECUTER DES COMMANDES

// Fonction pour exécuter une commande et enregistrer le résultat
function executeCommand($prompt)
{
    //execution
    $escapedCommand = escapeshellcmd($prompt);
    $output = shell_exec($escapedCommand . ' 2>&1');
    //logging
    logCommand($prompt, $output);
    return $output;
}

function logCommand($prompt, $output)
{
    $logFile = __DIR__ . "/../logs/" . $_SESSION['username'] . " - " . $_SESSION['pageName'] . ".log";

    // Enregistrer la commande dans le log
    $logEntry = "$ " . $prompt . "\n" . $output . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}
