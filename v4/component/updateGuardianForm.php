<?php

$groups = ["group1", "group2", "group3", "group4", "group5", "group6", "group7", "group8", "group9", "group10"];//$_SESSION["groups"];
$users = ["user1", "user2", "user3", "user4", "user5", "user6", "user7", "user8", "user9", "user10"];// //$_SESSION["users"];
$username_err = $groups_err = "";

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "updateGuardian") {
    if (empty($_POST["group"])) {
        $groups_err = "Veuillez selectionner au moins un groupe.";
    } elseif (!empty($_POST["name"])) {
        $username = escapeshellarg($_POST["name"]);
        $groups = !empty($_POST["group"]) ? escapeshellarg(implode(',', $_POST["group"])) : "";

        $payload = "sudo usermod -a -G";
        $payload .= " $groups";
        $payload .= " $username";

        $output = executeCommand($payload);

        $_SESSION["last_command"] = ["cmd" => $payload, "output" => $output];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $username_err = "Veuillez entrer un nom d'utilisateur.";
    }
}
?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-container">
        <div class="form-group">
            <input type="hidden" value="updateGuardian" name="action" class="form-control">
        </div>
        <!-- user name input -->
        <div class="form-group checkbox-container">
            <?php foreach ($users as $user) { ?>
                <label>
                    <input type="checkbox" name="user[]"
                        value="<?php echo htmlspecialchars($user, ENT_QUOTES, 'UTF-8'); ?>" />
                    <?php echo htmlspecialchars($user, ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <span class="invalid-feedback"><?php echo $groups_err; ?></span>
            <?php } ?>
        </div>
        <!-- Scrollable checkbox section -->
        <div class="form-group checkbox-container">
            <?php foreach ($groups as $group) { ?>
                <label>
                    <input type="checkbox" name="group[]"
                        value="<?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>" />
                    <?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <span class="invalid-feedback"><?php echo $groups_err; ?></span>
            <?php } ?>
        </div>

        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>