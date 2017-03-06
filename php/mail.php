<?php
//This file collects information from contact form and sends message to receiver
//specified in the $to variable and a confirmation message to the sender
//messages allow html formatting as well

if (isset($_POST['submit'])) {
	
	//message destination
	$to = "bryan@bryankristofferson.com";

	//fields from contact form
	$from = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];

	//subjects for both emails
	$subject = "Contact Form - Deltona Victory Chapel";
	$subject2 = "Message Received - Deltona Victory Chapel";

	//headers for original message sent
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: " . $from . "\r\n";
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// headers for confirmation email
	$headers2 =  "From: " . $to . "\r\n";
	$headers2 .= "Reply-To: " . $to . "\r\n";
	$headers2 .= 'MIME-Version: 1.0' . "\r\n";
	$headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		

	//message sent from page to receiver
	$message = '<html><body>';
	$message .= "<h1>Message Received - Deltona Victory Chapel</h1><b>Message from:</b> " . $name . "<br><b>Phone: " . 
				$phone . "</b><br>" . "<b>Email: " . $from . "</b><br><hr><p>" . 
				$_POST['message'];
	$message .= '</body></html>' . "</p>";

	//confirmation message context
	$message2 = '<html><body>';
	$message2 .= "<b>" .$name . ",</b><br>We have received your email. We will get back to you as soon as possible.<br> Thank you and God Bless." .	"<br><hr><br>" . "<b>Original Message:</b><br><p>" . $_POST['message'] . "</p>";
	$message2 .= '</body></html>';

	//message sent to receiver
	if(mail($to, $subject, $message, $headers, '-fcontact@bryankristofferson.com')){
		$msg = "Thank You! We will be in contact shortly.";	
	}else{
		$msg = "Something went wrong we were unable to send your message. Please make sure you entered a valid email address.";
	}
	//confirmation message sent to sender
	mail($from, $subject2, $message2, $headers2, "-fcontact@bryankristofferson.com");
	
	//website confirmation message
	


}


?>