<?php

	require('PHPMailer.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	$email = new PHPMailer();
	$email->From      = 'addoms@comcast.net';
	$email->FromName  = 'Your Name';
	$email->Subject   = 'Message Subject';
	$email->Body      = 'This is a test';
	$email->AddAddress( 'addomsatc@comcast.net' );

	$file_to_attach = 'c://xampp/htdocs/advancedphp/abstract.php';

	$email->AddAttachment( $file_to_attach , 'abstract.php' );

	if( $email->Send())
		{
			echo'message sent';
		}
	else
		{
			echo'message failed to send';
		}
?>
	
	
