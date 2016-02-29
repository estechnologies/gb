<?php
session_start();
unset($_SESSION['service_username']);
unset($_SESSION['service']);
session_destroy();
header('Location:index.php');
?>