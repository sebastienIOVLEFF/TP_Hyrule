<?php

$username_err = "";

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "delGuardian") {
    if (!empty($_POST["name"])) {
        $username = escapeshellarg($_POST["name"]);

        // Create the user without setting a password initially
        $payload = "sudo  deluser --remove-all-files";

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
    <div style="padding-bottom: 20px;">
        <p style="border: 1px solid #ccc; padding: 10px;">ce formulaire permet de supprimer un utilisateur. Tous les dossiers qui lui sont asssociés seront également supprimés.</p>
    </div>
    <div class="form-container">
        <div class="form-group">
            <input type="hidden" value="delGuardian" name="action" class="form-control">
        </div>
        <!-- user name input -->
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>

        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" onclick="return confirm(`ATTENTION! Cette action est irréversible, l'utilisateur ainsi que tous ses fichiers seront supprimés`)" value="Submit">
        </div>
    </div>
</form>