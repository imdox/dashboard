<?php
session_start();
require_once 'core/config/config.php';
include("functions.php");

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	// Get DB instance.
	$db = getDbInstance();
	$db->where('email', $username);
	$row = $db->getOne('users');
	if ($db->count >= 1) {
		if($row['password']==$password){
			$user_id = $row['id'];
			$_SESSION['i_user_id'] = $row['id'];
			$_SESSION['i_user_logged_in'] = true;

			$db->disconnect();
			setSessionExpiry();
			header('Location: index.php');
			exit;
		}else{
			$_SESSION['login_failure'] = "Wrong Password";
			$_SESSION['i_user_logged_in'] = false;
			header('Location: login.php');
			exit;
		}
	} else {
		$_SESSION['login_failure'] = "User not registered. Please register";
		$_SESSION['i_user_logged_in'] = false;
		header('Location: login.php');
		exit;
	}
} else {
	die('Method Not allowed');
}
