<?php
	session_start();
	if(isset($_SESSION["USERID"]) && isset($_SESSION["USERTYPE"]))
	{	header("location: ../index.php");
	
	
	}
	
	else
		
	{


		
		
		

$to      = $_REQUEST['Email'];
$subject = 'the subject';
$message = 'Your password is ';
$headers = 'From: koushikfardin@gmail.com' . "\r\n" .
    'Reply-To: koushikfardin@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

	echo "An Eamil Has Been Sent To ".$_REQUEST['Email'];
		
		
		
		
		
		
	
	}
	
	
?>