<?php
session_start();
require_once 'core/config/config.php';
include("functions.php");

// Serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);

    $db = getDbInstance();
    $db->where('email', $data_to_db['email']);
    $row = $db->getOne('users');

 
    // Insert user and timestamp
    date_default_timezone_set('Asia/Kolkata');
    $data_to_db['created_at'] = date('Y-m-d H:i:s');
    $currentTime = date('Y-m-d H:i:s ', time());
    $data_to_db['login_time'] = $currentTime;
    if ($db->count >= 1) {
        $db = getDbInstance();
        $db->where ('email',  $data_to_db['email']);
        $last_id = $db->update('users', $data_to_db);
    } else {
        try {
            $db = getDbInstance();
            $last_id = $db->insert('users', $data_to_db);
          }
          
          //catch exception
          catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
          }
    }
    if ($last_id) {
        // $db->where('email', $data_to_db['email']);
        // $row = $db->getOne('users');
        // $remember = TRUE;
        // $_SESSION['i_user_id'] = $row['id'];
        // $_SESSION['i_user_logged_in'] = TRUE;
		// setSessionExpiry();
        header('Location: login.php');
        exit;
    } else {
        echo 'Insert failed: ' . $db->getLastError();
        exit;
    }
}else{
    print_r('Wrong Post');
}



