
<?php 
require_once "db.php";
if (isset($_POST["id"])) {
	$id = $_POST["id"];
	$sql_c = "DELETE FROM courses WHERE id=?";
    $stmt_c = $db->prepare($sql_c);
    try {
      $stmt_c->execute([$id]);
      //header('Location:../courses.php?deleted');
      }
     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
    try {
        $sql_cmt = "DELETE FROM videos WHERE blogid=?";
        $stmt_cmt = $db->prepare($sql_cmt);
        $stmt_cmt->execute([$id]);
        header('Location:../courses.php?deleted');
        }
       catch (Exception $e) {
          $e->getMessage();
          echo "Error";
      }
}
else {
	header('Location:../courses.php?del_error');
}
?>