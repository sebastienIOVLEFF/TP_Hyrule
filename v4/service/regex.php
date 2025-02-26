<?php

/**
 * Vérifie si un nom d'utilisateur est valide (lettres, chiffres, tirets et underscores autorisés).
 */
function isValidUsername($username) {
    return preg_match('/^[a-z_][a-z0-9_-]{1,31}$/', $username);
}

/**
 * Vérifie si un nom de groupe est valide (lettres, chiffres et tirets autorisés, pas d'espaces).
 */
function isValidGroupName($group) {
    return preg_match('/^[a-z_][a-z0-9_-]{1,31}$/', $group);
}

/**
 * Vérifie si un nom de dossier est valide (lettres, chiffres, tirets, underscores et slashs autorisés).
 */
function isValidDirectoryName($directory) {
    return preg_match('/^[a-zA-Z0-9_-]+$/', $directory);
}

/**
 * Vérifie si un mot de passe respecte les critères de sécurité.
 */
function isValidPassword($password) {
    return preg_match('/[a-z]/', $password) && // Au moins une minuscule
           preg_match('/[A-Z]/', $password) && // Au moins une majuscule
           preg_match('/\d/', $password) &&   // Au moins un chiffre
           preg_match('/[@$!%*?&]/', $password); // Au moins un caractère spécial
}
