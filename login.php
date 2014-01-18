<?php
require_once 'scripts/utils/utils.php';
session_start();
// кука 'callphpsession'
// не безопасно
if (isset($_COOKIE['callphpsession'])) {
  if ($uid = check_cookie_sess($_COOKIE['callphpsession'])) {
    $_SESSION['uid'] = $uid;
    redirect('clients.php');
    exit();
  }
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
  if (($_POST['username']) && ($_POST['password'])) {
    $param = check_password($_POST['login'], $_POST['password']);
    setcookie('callphpsession', $param['cookie'] , time() + 36000);
    $_SESSION['uid'] = $param['uid'];
  } else {
    include('templates/login.html');
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  include('templates/login.html');
}
?>
