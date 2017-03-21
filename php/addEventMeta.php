<?php 
//This file will add events and return id for event meta to add event id

// db object from outside public dir tree
include('../../../dvc_private/dbObject.php');
$db = new mysqli($servername,$username,$password,$dbname);

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

$event_meta = json_decode($_POST['myString'], true);
$event_id = $event_meta['event_id'];
$repeating = $event_meta['repeating'];
$start_date = $event_meta['start_date'];
$end_date = $event_meta['end_date'];
if ($end_date == '') {
	$end_date = "NULL";
}
$week_day_num = $event_meta['week_day_num'];
$rpt_interval = $event_meta['rpt_interval'];
$time = $event_meta['time'];

$sql = "INSERT INTO `event_meta` 
		(`event_id`, `repeating`, `start_date`, `end_date`, week_day_num, `rpt_interval`, `time`)
	 	VALUES 
	 	('$event_id', '$repeating', '$start_date', $end_date, '$week_day_num', '$rpt_interval', '$time')";



if($db->query($sql)===TRUE){
	echo "Successfully added new schedule.";
}else{
	echo mysqli_error($db);
}

mysqli_close( $db );
?>