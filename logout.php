<?php //anytime a user logs out, they will be redirected to login page

session_start();
session_destroy();
header('location: login.php');
?>