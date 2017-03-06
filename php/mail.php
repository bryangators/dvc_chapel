<?php

if (isset($_POST['submit'])) {
	//email to recipient of message
	$to = "bryangators510@gmail.com";

	$from = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$subject = "Contact Form Message";
	
	$message = "Message from: " . $name . "\n" . "Phone: " . $phone . "\n\n" .
			   $_POST['message'];
	// $message2 = $name . " your email was sent. We will get back to you as soon as possible. Thank you and God Bless." .
	// 			"\n\n". "Original Message: " . "\n" .   $_POST['message'];

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $from . "\r\n";
	$headers .= "Return-Path: " . $from . "\r\n";
		
	mail('bryangators510@gmail.com', 'TEST', 'TEST', null, '-fbryan@bryankristofferson.com'); 

	// mail($to, $subject, $message, $headers, "-fbryan@bryankristofferson.com");
	// mail($from, $subject, $message, $headers);

	$msg = "Thank You! We will be in contact shortly.";


}


?>