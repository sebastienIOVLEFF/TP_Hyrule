<?php
$path_err = "";
$commande_err = "";

// Traitement des données lorsqu'un formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "changePermissions") {
    print_r($_POST);
    // Sécuriser les données
    $permission = isset($_POST["permission"]) ? escapeshellarg($_POST["permission"]) : "";
    $path = isset($_POST["path"]) ? escapeshellarg($_POST["path"]) : "";

    // Valider la commande
    if (empty($_POST["permission"])) {
        $path_err = "Veuillez entrer un nom d'utilisateur.";
    }
    // Valider le nom d'utilisateur
    if (empty($path)) {
        $path_err = "";
    }
    // Si tout est valide, procéder au traitement de la commande
    if (empty($commande_err) && empty($path_err)) {

        $payload = "sudo chmod -R";
        $payload .= " $permission";
        $payload .= " $path";

        $output = executeCommand($payload);

        $_SESSION["last_command"] = ["cmd" => $payload, "output" => $output];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-container">
        <div class="form-group">
            <input type="hidden" name="action" value="changePermissions">
        </div>
        <div class="form-group">
            <input type="text" name="permission" class="form-control" placeholder="Entrez une commande">
            <span class="invalid-feedback"><?php echo $commande_err; ?></span>
        </div>
        <!-- user name input -->
        <div class="form-group">
            <input type="text" name="path" class="form-control" placeholder="Entrez un fichier">
            <span class="invalid-feedback"><?php echo $path_err; ?></span>
        </div>
        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>


</html>