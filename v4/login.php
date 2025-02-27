<?php
session_start();

// Définir un mot de passe admin (⚠️ à améliorer avec un hash)
$admin_username = "admin";
$admin_password = "admin";

$username = $password = "";
$username_err = $login_err = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_err = "Veuillez entrer un nom d'utilisateur.";
    } elseif ($_POST["username"] !== $admin_username) {
        $login_err = "Nom d'utilisateur incorrect ou mot de passe incorrect.";
    }

    if (empty($_POST["password"])) {
        $password_err = "Veuillez entrer un mot de passe.";
    } elseif ($_POST["password"] !== $admin_password) {
        $login_err = "Nom d'utilisateur incorrect ou mot de passe incorrect.";
    }

    if (empty($username_err) && empty($password_err) && empty($login_err)) {
        // Authentification réussie
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["terminal_visible"] = true;

        // Redirection vers la page principale
        header("location: dashboard.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username"
                    class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"
                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>

        </form>
    </div>
</body>

</html>