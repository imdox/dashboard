<?php
// print_r($_POST); exit;
session_start();
require_once '../../core/config/config.php';

// Serve POST method, After successful insert, redirect to customers.php page.
if($_FILES['image']['error'] > 0) { echo 'Error during uploading, try again'; }
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['image']['error'] == 0) {
  //We won't use $_FILES['file']['type'] to check the file extension for security purpose
  
  //Set up valid image extensions
  $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
  
  //Extract extention from uploaded file
    //substr return ".jpg"
    //Strrchr return "jpg"
    
  $extUpload = strtolower( substr( strrchr($_FILES['image']['name'], '.') ,1) ) ;

  //Check if the uploaded file extension is allowed
  
  if (in_array($extUpload, $extsAllowed) ) { 
  
  //Upload the file on the server
  if (!file_exists(BASE_PATH.'/images/event_img')) {
    mkdir(BASE_PATH.'/images/event_img', 0777, true);
  }
  
  $imglink = "../images/event_img/{$_FILES['image']['name']}";
  $imgpath = BASE_PATH . "/images/event_img/{$_FILES['image']['name']}";
  $result = move_uploaded_file($_FILES['image']['tmp_name'], $imgpath);
  foreach($_POST as $key => $csm) {
    $_POST['image'] = $imglink;
 }
 if($_POST['active'] == "on"){
    $_POST['active'] = 1;
 }
  // Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_db = array_filter($_POST);
    $db = getDbInstance();
    $last_id = $db->insert('events', $data_to_db);

    if ($last_id) {
      header('Location:../events.php');
      // header("Location: localhost:8888/rcp/admin/videos.php");
      die();
    } else {
      $myObj['res'] = 'error';
      $myObj['msg'] = 'Event not added '. $db->getLastError(); 

      $myJSON = json_encode($myObj);

      echo $myJSON;
        exit;
    }
  } else { echo 'File is not valid. Please try again'; }
    
}else{
    print_r('Wrong Post');
}
