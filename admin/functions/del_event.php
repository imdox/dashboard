
<?php 
require_once "db.php";
if (isset($_POST["id"])) {
	$id = $_POST["id"];
	$sql_c = "DELETE FROM events WHERE id=?";
    $stmt_c = $db->prepare($sql_c);
    try {
      $stmt_c->execute([$id]);
      header('Location:../events.php?deleted');
      }
     catch (Exception $e) {
        $e->getMessage();
        echo "Error";
    }
}
else {
	header('Location:../events.php?del_error');
}
?>