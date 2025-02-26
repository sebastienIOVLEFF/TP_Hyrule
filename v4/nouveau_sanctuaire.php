<?php
    $username_err = "";
    $commande_err = ["commande"];
    
    // Traitement des données lorsqu'un formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        print_r($_POST);
    // Sécuriser les données
    $commande = isset($_POST["commande"]) ? htmlspecialchars($_POST["commande"]) : "";
    $username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
    }
      // Valider la commande
      if (empty($commande)) {
        $commande_err = "Veuillez entrer une commande.";
    }
      // Valider le nom d'utilisateur
      if (empty($username)) {
        $username_err = "";
    } elseif (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $username)) {
        $username_err = "Nom d'utilisateur invalide. (3-16 caractères, alphanumérique, tirets et underscores autorisés)";
    }
       // Si tout est valide, procéder au traitement de la commande
       if (empty($commande_err) && empty($username_err)) {
    }   
        // exécuter la commande
       // echo "<p>Commande exécutée : $commande</p>";
       // echo "<p>Utilisateur : $username</p>";
      

?>  
<!DOCTYPE html>
<html lang="en">
    
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
    <div class="form-container">
        <div class="form-group">
            <input type="text" name="commande" class="form-control" placeholder="Entrez une commande">
        </div><br>
        <!-- user name input -->    
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Entrez un nom d'utilisateur">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div><br>
        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
 </form>
    
 
</html>
