<?php
session_start();

if (!isset($_SESSION['terminal_visible'])) {
    $_SESSION['terminal_visible'] = false;
}

$_SESSION['terminal_visible'] = !$_SESSION['terminal_visible'];

echo json_encode(["visible" => $_SESSION['terminal_visible']]);
exit;
