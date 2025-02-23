<?php

// Chemin du fichier log
$logFile = __DIR__ .  "/../logs/". $_SESSION['username']." - ". $_SESSION['pageName'].".log";

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

<!-- <div style="margin: 10px;">
    <a href="?toggle_terminal=1" style="text-decoration: none; padding: 5px 10px; background: #444; color: #fff; border-radius: 5px;">
        <?= $_SESSION['terminal_visible'] ? "Masquer le terminal" : "Afficher le terminal" ?>
    </a>
</div> -->

<?php if ($_SESSION['terminal_visible']): ?>
    <div class="terminal">
        <pre><?php echo htmlspecialchars($logs); ?></pre>
    </div>
<?php endif; ?>
