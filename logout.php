<?php

session_start();
$_SESSION = array();
session_destroy();
header("Location:/AdBroker_AdminPanel/admin-login.php");
?>