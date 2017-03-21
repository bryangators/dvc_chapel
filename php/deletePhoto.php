<?php

$photo = $_POST['photo'];
$defaultPhoto = "../images/event_images/logo1000.png";

//will not delete default photo
if (strcmp($photo, $defaultPhoto) != 0) {	
	if (unlink($photo)) {
	echo "deleted ". $photo;
	}
}


?>