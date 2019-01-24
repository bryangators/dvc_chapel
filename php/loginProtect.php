<?php

session_start();

if( isset($_SESSION["username"])) {

	//do nothing

	} else {

	header("Location: login.php");
	exit;

	} //end of if statement

?>
