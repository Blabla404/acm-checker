<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie('login', '');
setcookie('sha1Pass', '');
header('Location: index.php');
?>
