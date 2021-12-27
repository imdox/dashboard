<?php 
session_start();
unset($_SESSION['i_user_logged_in']);
unset($_SESSION['i_user_id']);
header('Location: login.php');
?>