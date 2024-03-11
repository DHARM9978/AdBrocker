<?php

if ($_SESSION["is_loggedin"] == true) {
    header('Location:/AdBroker_AdminPanel/Pages/ab-dashboard.php');
} else {
    header("Location:/AdBroker_AdminPanel/admin-login.php");
}
?>
