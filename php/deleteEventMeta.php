<?php

// db object from outside public dir tree
require_once '../../../db/dvc_connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$id = $_POST['meta_id'];

$sql = "DELETE FROM event_meta WHERE id = '".$id."'";

if($db->query($sql)===true) {
	//success
	echo "Successfully deleted schedule.";
}else{
	echo mysqli_error($db);

}


?>
