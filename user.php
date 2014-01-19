<?php
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['group'])) {
  header("Location: /login.php");
  exit();
}
//TODO: Убрать хардкод
if ($_SESSION['group'] == "manager") {
  header("Location: /manager.php");
  exit();
}
require_once ('scripts/controllers/user.php');
$clients = get_clients_for_user($_SESSION['uid']);
include('templates/user.php')
?>
