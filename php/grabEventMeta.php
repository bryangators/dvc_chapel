<!-- This file will grab all event meta data from database -->

<?php 
error_reporting(E_ALL);

//database object
include('../../../dvc_private/dbObject.php');

if ($db->connect_error) {
		die("Connection failed: " . $db->connect_error);
}
//grabs all events in the database and returns json array
if ($result = $db->query("SELECT * FROM event_meta")) {
			$array = array();

			while($row = mysqli_fetch_assoc($result)) {
		   		$array[] = $row;
			}
			
			echo json_encode($array);			
}	
?>