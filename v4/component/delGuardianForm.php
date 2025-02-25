<?php

$username_err = "";

// Traitement du formulaire si une commande est soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "delGuardian") {
    if (!empty($_POST["name"])) {
        $username = escapeshellarg($_POST["name"]);
        $groups = !empty($_POST["group"]) ? escapeshellarg(implode(',', $_POST["group"])) : "";

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
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>