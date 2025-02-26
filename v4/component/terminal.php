<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    exit;
}

// Chemin du fichier log
$logFile = __DIR__ . "/../logs/" . $_SESSION['username'] . " - " . $_SESSION['pageName'] . ".log";

// Vérifier si le fichier log existe, sinon le créer
if (!file_exists($logFile)) {
    file_put_contents($logFile, "=== Terminal Log ===\n");
}

// Lire le fichier log
$logs = file_get_contents($logFile);

// Vérifier l'état du terminal (affiché ou masqué)
if (!isset($_SESSION['terminal_visible'])) {
    $_SESSION['terminal_visible'] = false;
}

// Si l'utilisateur change l'état du terminal
if (isset($_GET['toggle_terminal'])) {
    $_SESSION['terminal_visible'] = !$_SESSION['terminal_visible'];
    header("Location: " . $_SERVER['PHP_SELF']); // Rediriger pour éviter le double affichage
    exit;
}
?>

<div style="margin: 10px;">
    <button id="toggleTerminalBtn" <?= !$_SESSION['terminal_visible'] ? "style='bottom: 0;'" : "" ?>>
        <?= $_SESSION['terminal_visible'] ? "▽" : "△" ?>
    </button>
</div>

<div id="terminalContainer" class="terminal" style="display: <?= $_SESSION['terminal_visible'] ? 'block' : 'none' ?>;">
    <pre id="terminalLogs"><?php echo htmlspecialchars($logs); ?></pre>
</div>

<script src="component/terminal.js"></script>