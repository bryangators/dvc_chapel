<?php
// This file will grab all event meta data from database

//database object
require_once '../../../db/dvc_connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$id = $_POST['event_id'];

$sql = "SELECT * FROM event WHERE id = '".$id."'";


if ($result = $db->query($sql)) {
	$row = mysqli_fetch_assoc($result);
	$Result = str_replace( "\n", '<br />', $row);
	$event = json_encode($row);
	echo $event;
}else{
	echo mysqli_error($db);
}

mysqli_close( $db );
?>
