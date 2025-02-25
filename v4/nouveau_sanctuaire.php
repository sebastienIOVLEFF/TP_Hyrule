<?php
ob_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-container">
        <div class="form-group">
            <label for="command">groupadd</label>
            <input type="command" name="commande" class="form-control" value="<?php echo isset($_POST['command']) ? htmlspecialchars($_POST['command'], ENT_QUOTES, 'UTF-8') : ''; ?>">>
            <span class="invalid-feedback"><?php echo $command_err; ?></span>
        </div>
        <!-- user name input -->
        <div class="form-group">
            <input type="submit" value="Exécuter" class="btn btn-primary">
        </div>
    </form>
      

        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>