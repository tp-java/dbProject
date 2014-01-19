<?php
require_once 'scripts/controllers/login.php';
session_start();
// кука 'callphpsession'
// не безопасно
if (isset($_COOKIE['callphpsession'])) {
  if ($param = check_cookie_sess($_COOKIE['callphpsession'])) {
    $_SESSION['uid'] = $param['uid'];
    $_SESSION['group'] = $param['group'];
    custom_redirect();
  }
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  if ((isset($_POST['username'])) && (isset($_POST['password']))) {
    $param = check_password($_POST['username'], $_POST['password']);
    setcookie('callphpsession', $param['cookie'] , time() + 36000);
    $_SESSION['uid'] = $param['uid'];
    $_SESSION['group'] = $param['group'];
    custom_redirect();
  } else {
    include('templates/login.html');
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  include('templates/login.html');
}

function custom_redirect() {
  //TODO: убрать хардкод
  if ($_SESSION['group'] == 0)
    header("Location: /user.php");
  if ($_SESSION['group'] == 1)
    header("Location: /manager.php");
  exit();
}
?>
