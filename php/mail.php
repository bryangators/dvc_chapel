<?php

if (isset($_POST['submit'])) {
	//email to recipient of message
	$to = "bryan@bryankristofferson.com";

	$from = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	$subject = "deltonavictorychapel.com Contact Form Message";
	$subject2 = "Deltona Victory Chapel: Message Sent Confirmation";

	$message = "Message from: " . $name . "\n" . "Phone: " . $phone . "\n\n" .
			   $_POST['message'];
	$message2 = $name . " your email was sent. We will get back to you as soon as possible. Thank you and God Bless." .
				"\n\n". "Original Message: " . "\n" .   $_POST['message'];

	// $headers .= "Reply-To: The Sender <". $to . ">\r\n"; 
 //  	$headers .= "Return-Path: The Sender <". $to . ">\r\n";
 //  	$headers .= "From: The Sender <". $to . ">\r\n";
 //  	$headers .= "MIME-Version: 1.0\r\n";
 //    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
 //    $headers .= "X-Priority: 3\r\n";
 //    $headers .= "X-Mailer: PHP". phpversion() ."\r\n"  
	$headers = "From: ". $from . "\r\n";

	mail($to, $subject, $message, $headers);
	// mail($from, $subject2, $message2, $headers2);

	$msg = "Thank You! We will be in contact shortly.";


}


?>