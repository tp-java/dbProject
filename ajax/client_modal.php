<?php
require_once dirname(dirname(__FILE__)) . '/scripts/controllers/ajax.php';
session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['group'])) {
  header("Location: /login.php");
  exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
    $client = get_client_by_cid($_GET['id']);
    include dirname(dirname(__FILE__)) . '/templates/client_modal_tpl.php';
}
?>