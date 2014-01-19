<?php
session_destroy();
setcookie('callphpsession', NULL , 0);
header("Location: /login.php");
?>
