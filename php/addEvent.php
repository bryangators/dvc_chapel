<?php 
//This file will add events and return id for event meta to add event id

// db object from outside public dir tree
include('../../../dvc_private/dbObject.php');

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event = json_decode($_POST['myString'], true);
$title = $event['title']; 
$img_url = $event['img_url'];
$summary = $event['summary'];
$speaker = $event['speaker'];


$sql = "INSERT INTO event (title, img_url, summary, speaker) 
				VALUES ('$title','$img_url' ,'$summary' ,'$speaker' )";


if($db->query($sql)===TRUE){
	$new_id = $db->insert_id;
	echo $new_id;
}else{
	echo "Error something went wrong please try again.";
}


?>