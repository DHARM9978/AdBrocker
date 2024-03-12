<?php

session_start();
$_SESSION = array();
session_destroy();
header("Location:/AdBrocker_Admin/admin-login.php");
?>