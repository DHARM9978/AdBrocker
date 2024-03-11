<?php

if ($_SESSION["is_loggedin"] == true) {
    header('Location:/AdBrocker_Admin/Pages/ab-dashboard.php');
} else {
    header("Location:/AdBrocker_Admin/admin-login.php");
}
?>
