<?php

$group_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == "add" || $_POST['action'] == "mod")) {
    if (!empty($_POST["group_name"])) {
        $action = $_POST['action'];
        $groupName = escapeshellarg($_POST['group_name']);
        $newGroupName = isset($_POST['new_group_name']) ? escapeshellarg($_POST['new_group_name']) : '';

        $output = '';

        if ($action == 'add') {
            $cmd = "sudo groupadd $groupName";
        } elseif ($action == 'mod' && !empty($newGroupName)) {
            $cmd = "sudo groupmod -n $newGroupName $groupName";
        }

        $output = executeCommand($cmd);
    } else {
        $group_err = "Veuillez entrer un nom de groupe.";
    }
}
?>


<form method="post">
    <div style="padding-bottom: 20px;">
        <p style="border: 1px solid #ccc; padding: 10px;">Ajouter ou Modifier un Groupe</p>
    </div>
    <div class="form-container">
        <span class="form-group">
            <label for="group_name">Nom du groupe :</label>
            <input type="text" name="group_name" required>
        </span>
        <span class="form-group">
            <label for="action">Action :</label>
            <select name="action" id="action" onchange="toggleNewGroupName()">
                <option value="add">Ajouter</option>
                <option value="mod">Modifier</option>
            </select>
        </span>
        <span class="form-group">
            <div id="new_group_name_field" style="display:none;">
                <label for="new_group_name">Nouveau nom du groupe :</label>
                <input type="text" name="new_group_name">
            </div>
        </span>
        <button class="form-group" type="submit">Exécuter</button>
</form>
</div>

<script>
    function toggleNewGroupName() {
        var action = document.getElementById("action").value;
        document.getElementById("new_group_name_field").style.display = action === "mod" ? "block" : "none";
    }
</script>