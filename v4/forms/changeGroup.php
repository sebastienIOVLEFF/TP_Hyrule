<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == "add" || $_POST['action'] == "mod")) {
    if (empty($_POST["group_name"])) {
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
}
?>


    <h2>Ajouter ou Modifier un Groupe</h2>
    <form method="post">
        <label for="group_name">Nom du groupe :</label>
        <input type="text" name="group_name" required>
        <br>
        <label for="action">Action :</label>
        <select name="action" id="action" onchange="toggleNewGroupName()">
            <option value="add">Ajouter</option>
            <option value="mod">Modifier</option>
        </select>
        <br>
        <div id="new_group_name_field" style="display:none;">
            <label for="new_group_name">Nouveau nom du groupe :</label>
            <input type="text" name="new_group_name">
        </div>
        <br>
        <button type="submit">Exécuter</button>
    </form>

    <?php if (!empty($output)): ?>
        <h3>Résultat :</h3>
        <pre><?php echo htmlspecialchars($output); ?></pre>
    <?php endif; ?>

    <script>
        function toggleNewGroupName() {
            var action = document.getElementById("action").value;
            document.getElementById("new_group_name_field").style.display = action === "mod" ? "block" : "none";
        }
    </script>
