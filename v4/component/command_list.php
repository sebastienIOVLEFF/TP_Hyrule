<?php

function addGuardian($username, $password, $groupes = []) {
  global $logFile;

    // Vérification du format du nom d'utilisateur (alphanumérique + tiret/bas)
    if (!preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $username)) {
      return "Nom d'utilisateur invalide.";
  }

  // Création de l'utilisateur
  $command = "sudo useradd -m $username";
  shell_exec($command);

  // Définition du mot de passe (mais sans le stocker en clair)
  $escapedPass = escapeshellarg($password);
  shell_exec("echo '$username:$escapedPass' | sudo chpasswd");

  // Attribution des groupes
  if (!empty($groups)) {
      $groupList = implode(',', $groups);
      shell_exec("sudo usermod -aG $groupList $username");
  }

 // Enregistrer l'action dans le log (sans afficher le mot de passe)
  $logEntry = "[+] Utilisateur créé : $username | Groupes : " . implode(',', $groups) . "\n";
  file_put_contents($logFile, $logEntry, FILE_APPEND);

  return "Utilisateur '$username' créé avec succès.";
}

function deleteGuardian($username) {
  global $logFile;

  // Suppression de l'utilisateur
  $command = "sudo userdel -r" . $username;
  shell_exec($command);

  // Enregistrer l'action dans le log
  $logEntry = "[-] Utilisateur supprimé : $username\n";
  file_put_contents($logFile, $logEntry, FILE_APPEND);

  return "Utilisateur '$username' supprimé avec succès.";
}

?>