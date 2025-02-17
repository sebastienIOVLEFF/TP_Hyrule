<?php 
session_start();

if (!(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>dashboard</title>
    </head>
    <body>
        <h1>dashboard</h1>
        
        <p>variables de session :
        <?php
            echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
        ?>
        </p>
    </body>
</html>
