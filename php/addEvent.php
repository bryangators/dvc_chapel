<?php
//This file will add events and return id for event meta to add event id

// db object from outside public dir tree
require_once '../../../db/connect.php';

$event = json_decode($_POST['myString'], true);
$title = addslashes($event['title']);
$img_url = addslashes($event['img_url']);
$summary = addslashes($event['summary']);
$speaker = addslashes($event['speaker']);


$sql = "INSERT INTO event (title, img_url, summary, speaker)
				VALUES ('$title','$img_url' ,'$summary' ,'$speaker' )";


if($db->query($sql)===TRUE){
	$new_id = $db->insert_id;
	echo $new_id;
}else{
	echo "Error something went wrong please try again.";
}

mysqli_close( $db );
?>
