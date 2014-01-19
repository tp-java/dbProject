<?php
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['group'])) {
  header("Location: /login.php");
  exit();
}
//TODO: Убрать хардкод
if ($_SESSION['group'] == "employer") {
  header("Location: /user.php");
  exit();
}
require_once ('scripts/controllers/user.php');
$clients = get_clients_for_user($_SESSION['uid']);
$users = get_users_for_manager($_SESSION['uid']);
include('templates/manager.php')
?>
