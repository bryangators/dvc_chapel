<?php 
//This file will add events and return id for event meta to add event id

// db object from outside public dir tree
include('../../../dvc_private/dbObject.php');
$db = new mysqli($servername,$username,$password,$dbname);

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event_meta = json_decode($_POST['myString'], true);
//need to access event meta from ajax post




//need sql command to add event_meta to db for each in array
$sql = "INSERT INTO event (title, img_url, summary, speaker) 
				VALUES ('$title','$img_url' ,'$summary' ,'$speaker')";


if($db->query($sql)===TRUE){
	//success
}else{
	echo "Error something went wrong please try again.";
}

mysqli_close( $db );
?>