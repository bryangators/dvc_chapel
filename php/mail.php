<?php

if (isset($_POST['submit'])) {
	//email to recipient of message
	$to = "bryan@bryankristofferson.com";
	$from = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$subject = "Contact Form - Deltona Victory Chapel";
	$subject = "Message Received - Deltona Victory Chapel"

	$message = "Message from: " . $name . "\n" . "Phone: " . 
				$phone . "\nEmail: " . $from . "\n\n" . 
				$_POST['message'];
	$message2 = $name . " your email was sent. We will get back to you as soon as possible. Thank you and God Bless." .	"\n\n". "Original Message: " . "\n\nOriginal Message: " .   $_POST['message'];

	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $from . "\r\n";

	$headers2 = "From: " . $to . "\r\n";
	$headers2 .= "Reply-To: " . $to . "\r\n";
			
	mail($to, $subject, $message, $headers, '-fcontact@bryankristofferson.com'); 

	mail($from, $subject2, $message2, $headers2, "-fcontact@bryankristofferson.com");
	

	$msg = "Thank You! We will be in contact shortly.";


}


?>