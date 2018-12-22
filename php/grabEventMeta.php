<?php
// This file will grab all event meta data from database

//database object
require_once '../../../db/dvc_connect.php';

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}
//grabs all events in the database and returns json array
if ($result = $db->query("SELECT * FROM event_meta ORDER BY start_date")) {
			$array = array();

			while($row = mysqli_fetch_assoc($result)) {
		   		$array[] = $row;
			}

			echo json_encode($array);
}

mysqli_close( $db );
?>
