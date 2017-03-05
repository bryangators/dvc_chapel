<?php

if (isset($_POST['submit'])) {
	//email to recipient of message
	$to = "bryangators510@gmail.com";

	$from = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$subject = "deltonavictorychapel.com Contact Form Message";
	$subject2 = "Deltona Victory Chapel: Message Sent Confirmation";

	$message = "Message from: " . $name . "\n" . "Phone: " . $phone . "\n\n" .
			   $_POST['message'];
	$message2 = $name . " your email was sent. We will get back to you as soon as possible. Thank you and God Bless." .
				"\n\n". "Original Message: " . "\n" .   $_POST['message'];

	$headers = "From: " . $from . "\r\n";
	$headers2 = "From: " . $to . "\r\n";

	mail($to, $subject, $message, $headers);
	mail($from, $subject2, $message2, $headers2);

	$msg = "Thank You! We will be in contact shortly.";


}


?>