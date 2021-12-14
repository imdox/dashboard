<?php
require_once '../core/config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	
	$username = filter_input(INPUT_POST, 'email');
	$password = filter_input(INPUT_POST, 'password');
	
	// Get DB instance.
	$db = getDbInstance();
	
	$db->where('email', $username);
	
	$row = $db->getOne('admin');
	if ($db->count >= 1)
    {
		$db_password = $row['password'];
		$user_id = $row['id'];

		if (password_verify($password, $db_password))
        {
			$_SESSION['admin_user_logged_in'] = TRUE;
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_email'] = $row['email'];

			if ($remember)
            {
				$series_id = randomString(16);
				$remember_token = getSecureRandomToken(20);
				$encryted_remember_token = password_hash($remember_token,PASSWORD_DEFAULT);

				$expiry_time = date('Y-m-d H:i:s', strtotime(' + 30 days'));
				$expires = strtotime($expiry_time);

				setcookie('admin_series_id', $series_id, $expires, '/');
				setcookie('admin_remember_token', $remember_token, $expires, '/');

				// $db = getDbInstance();
				// $db->where ('id',$user_id);

				// $update_remember = array(
				// 	'series_id'=> $series_id,
				// 	'remember_token' => $encryted_remember_token,
				// 	'expires' =>$expiry_time
				// );
				// $db->update('admin', $update_remember);
			}
			// Authentication successfull redirect user
			header('Location: index.php');
		}
        else
        {
			$_SESSION['admin_login_failure'] = 'Invalid user name or password';
			header('Location: login.php');
		}
		exit;
	}
    else
    {
		$_SESSION['admin_login_failure'] = 'Invalid user name or password';
		header('Location: login.php');
		exit;
	}
}
else
{
	die('Method Not allowed');
}
