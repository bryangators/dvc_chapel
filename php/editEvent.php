<?php
//This file will add events and return id for event meta to add event id

// db object from outside public dir tree
require_once '../../../db/connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event = json_decode($_POST['event'], true);
$id = $event['id'];
$title = addslashes($event['title']);
$img_url = addslashes($event['img_url']);
$summary = addslashes($event['summary']);
$speaker = addslashes($event['speaker']);

$sql = "UPDATE event SET title = '".$title."', img_url = '".$img_url."', summary = '".$summary."', speaker = '".$speaker."' WHERE id = ".$id;

if($db->query($sql)===TRUE){
	echo "Successfully updated event.";
}else{
	echo mysqli_error($db);
}

mysqli_close( $db );
?>
