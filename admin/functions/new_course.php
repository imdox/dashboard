<?php
session_start();
require_once '../../core/config/config.php';

// Serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);
    $db = getDbInstance();
    $last_id = $db->insert('courses', $data_to_db);

    if ($last_id) {
      $myObj['res'] = 'success';
      $myObj['msg'] = 'Course added successfully'; 

      $myJSON = json_encode($myObj);

      echo $myJSON;
        exit;
    } else {
      $myObj['res'] = 'error';
      $myObj['msg'] = 'Course not added'. $db->getLastError(); 

      $myJSON = json_encode($myObj);

      echo $myJSON;
        exit;
    }
}else{
    print_r('Wrong Post');
}
