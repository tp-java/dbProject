<?php
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['group'])) {
  header("Location: /login.php");
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
    require_once dirname(dirname(__FILE__)) . '/scripts/controllers/user.php';
    $clients = get_clients_for_user($_GET['id']);
    include dirname(dirname(__FILE__)) . '/templates/employe_ajax_tpl.php';
}
?>
