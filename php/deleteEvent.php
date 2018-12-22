<?php
//this file will delete all event data and associated dependencies
//i.e. event photo and all meta data associated with the event to
//be deleted

// db object from outside public dir tree
require_once '../../../db/dvc_connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event_id = $_POST['event_id'];

$photo = $_POST['img_url'];
$defaultPhoto = "../images/event_images/logo1000.png";
// echo $photo;
$message = "";

//prevents deleting default photo
if (strcmp($photo, $defaultPhoto) != 0) {
	if (!unlink($photo)) {
		//if photo is not deleted
	 	$message .= "Unable to delete photo associated with event.<br>";
	}
}


if(!deleteAssociatedMeta($event_id)){
	$message .= "Associated event schedules were not deleted.<br>";
}

if(!deleteEvent($event_id)){
	$message .= "Event was not deleted. Something went wrong. Please contact administrator for help. Event will still show up on website.<br>";
}

if (strlen($message) == 0) {
	$message .= "Your event was successfully deleted from the database.";
}

echo $message;





function deleteEvent($id){
	global $db;

	$sql = "DELETE FROM event WHERE id = '".$id."'";

	if($db->query($sql)===true) {
    	//success
    	return true;
    }else{
    	//error
    	return false;
    }
}

function deleteAssociatedMeta($id){
	global $db;

	$sql = "DELETE FROM event_meta WHERE event_id = '".$id."'";

	if($db->query($sql)===true) {
    	//success
    	return true;
    }else{
    	echo mysqli_error($db);
    	return false;
    }
}

?>
