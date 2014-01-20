<?php
require_once(dirname(dirname(__FILE__)) . '../models/Users.php');

function check_cookie_sess($cookie) {
  $user = new Users();
  if ($user->loadUserBySessId($cookie))
    return array('uid' => $user->getId(), 'initials' => $user->getFirstName () . ' ' . $user->getLastName(), 'group' => $user->getRole());
  return false;
}

function check_password($username, $password) {
  $user = new Users();
  if ($user->loadUserByLoginPass($username, $password))
    return array('uid' => $user->getId(), 'initials' => $user->getFirstName () . ' ' . $user->getLastName(), 'cookie' => $user->generateNewSessionId(), 'group' => $user->getRole());
  return false;
}

?>
