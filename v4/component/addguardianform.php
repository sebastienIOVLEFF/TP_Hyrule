<?php

$groups = array("Group1", "Group2", "Group3");
$password_err = "";
$name = "test";


?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-container">
        <!-- Scrollable checkbox section -->
        <div class="form-group checkbox-container">
            <?php foreach ($groups as $group) { ?>
                <label>
                    <input type="checkbox" name="group[]" value="<?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>" /> 
                    <?php echo htmlspecialchars($group, ENT_QUOTES, 'UTF-8'); ?>
                </label>
            <?php } ?>
        </div>
            
        <!-- Password input -->
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
            
        <!-- Submit button -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </div>
</form>