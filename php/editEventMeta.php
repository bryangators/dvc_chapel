<?php

// db object from outside public dir tree
require_once '../../../db/dvc_connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event_meta = json_decode($_POST['myString'], true);
$id = $event_meta['id'];
$event_id = $event_meta['event_id'];
$repeating = $event_meta['repeating'];
$start_date = $event_meta['start_date'];
$end_date = $event_meta['end_date'];
$week_day_num = $event_meta['week_day_num'];
$rpt_interval = $event_meta['rpt_interval'];
$time = $event_meta['time'];

if ($end_date == '') {
	$end_date = "NULL";
	$sql = "UPDATE event_meta SET repeating = '".$repeating."', start_date = '".$start_date."', end_date = ".$end_date.", week_day_num = '".$week_day_num."', rpt_interval = '".$rpt_interval."', time = '".$time."' WHERE id = ".$id;
}else{
	$sql = "UPDATE event_meta SET repeating = '".$repeating."', start_date = '".$start_date."', end_date = '".$end_date."', week_day_num = '".$week_day_num."', rpt_interval = '".$rpt_interval."', time = '".$time."' WHERE id = ".$id;
}


// echo $sql;
if($db->query($sql)===true) {
	//success
	echo "Successfully made changes to schedule.";
}else{
	echo mysqli_error($db);
}


?>
