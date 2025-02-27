<?php

$groups = ["group1", "group2", "group3", "group4", "group5", "group6", "group7", "group8", "group9", "group10"];//$_SESSION["groups"];
$username_err = $group_err = $password_err = "";

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "addGuardian") {
    // validation
    if (isValidUsername($_POST["name"])) {
        if (empty($_POST["group"]) || $_POST["group"][0] == "") {
            $group_err = "Veuillez choisir au moins un groupe.";
        } else {
            foreach ($_POST["group"] as $group) {
                if (!isValidGroupName($group)) {
                    $group_err = "Veuillez entrer un nom de groupe valide.";
                }
            }
            if ($group_err == "") {
                if (!empty($_POST["password"]) && !isValidPassword($_POST["password"])) {
                    $password_err = "Veuillez entrer un mot de passe valide.";
                }
                if ($password_err == "") {// Traitement des données

                    $groups = !empty($_POST["group"]) ? implode(',', $_POST["group"]) : "";

                    // Create the user without setting a password initially
                    $payload = "sudo useradd -m";
                    if (!empty($groups)) {
                        $payload .= " -G $groups";
                    }
                    $payload .= " $username";

                    $output = executeCommand($payload);

                    if (!empty($_POST["password"])) {
                        $password = $_POST["password"];
                        $chpasswdCmd = "echo '$username:$password' | sudo chpasswd";
                        $result = shell_exec($chpasswdCmd);

                        // log the censored version of the command
                        $censored_password = str_repeat("*", strlen($password));
                        $censored_chpasswdCmd = "echo '$username:$censored_password' | sudo chpasswd";

                        $output .= "\n" . logCommand($censored_chpasswdCmd, $result) . "\n";
                    }

                    $_SESSION["last_command"] = ["cmd" => $payload, "output" => $output];
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit;
                }
            }
        }
    } else {
        $username_err = "nom d'utilisateur non valide.";
    }
}
?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div style="padding-bottom: 20px;">
        <p style="border: 1px solid #ccc; padding: 10px;">ce formulaire permet de créer un nouvel utilisateur. On peut
            optionnelement lui atribuer des groupes.</p>
    </div>
    <div class="form-container">
        <div class="form-group">
            <input type="hidden" value="addGuardian" name="action" class="form-control">
        </div>
        <!-- user name input -->
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nom d'utilisateur" required>
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <!-- Scrollable checkbox section -->
        <div class="form-group checkbox-container">
            <span class="invalid-feedback"><?php echo $group_err; ?></span>
            <?php foreach ($groups as $group) { ?>
                <label>
                    <input type="checkbox" name="group[]"
                        value="<?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>" />
                    <?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>
                </label>
            <?php } ?>
            <label>
                <input style="width: 100%; height: 30px;" type="text" name="group[]" placeholder="Ajouter un groupe" />
            </label>
        </div>

        <!-- Password input -->
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>

        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>