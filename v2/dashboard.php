<?php 
// index.php
session_start();

if (!(isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['loggedin']))) {
  header('Location: index.php');
  exit;
}
?>