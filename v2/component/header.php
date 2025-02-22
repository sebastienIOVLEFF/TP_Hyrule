

<header class="header">
    <div class="logo">
        <a href="dashboard.php">Hyrule Dashboard</a>
    </div>
    <nav class="nav">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="compteDesGardiens.php">Gardiens</a></li>
            <li><a href="sanctuairesPersonnels.php">Sanctuaires</a></li>
            <li><a href="ordresEtAlliances.php">Alliances</a></li>
        </ul>
    </nav>
    <div class="user-info">
        <span><?php echo htmlspecialchars($_SESSION['username'] ?? 'Invité'); ?></span>
        <a href="logout.php" class="logout-btn">Déconnexion</a>
    </div>
</header>
