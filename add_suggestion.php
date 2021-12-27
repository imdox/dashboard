<?php
session_start();
require_once 'core/config/config.php';
include("functions.php");

// Serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);
 
    // Insert user and timestamp
    $last_id;
    try {
        $db = getDbInstance();
        $last_id = $db->insert('suggestions', $data_to_db);
      }
      //catch exception
      catch(Exception $e) {
        $myObj['res'] = 'error';
        $myObj['msg'] = 'Something went wrong, Please try again.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
        exit;
      }
    if ($last_id) {
        $myObj['res'] = 'success';
        $myObj['msg'] = 'Suggestion saved successfully.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
        exit;
    } else {
        $myObj['res'] = 'error';
        $myObj['msg'] = 'Something went wrong, Please try again.';
        $myJSON = json_encode($myObj);
        echo $myJSON;
        exit;
    }
}else{
    print_r('Wrong Post');
}



