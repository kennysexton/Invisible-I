<?php


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require 'Exception.php';
	require 'PHPMailer.php';
	require 'SMTP.php';


	$ToEmailAddress = "tug83270@temple.edu";
	$mail = new PHPMailer(true);
	try
	{
		$mail->SMTPDEBUG = 2;
		$mail->IsSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Username = "ryantemplemailer@gmail.com";
		$mail->Password="Xvtwxvtw204";
		$mail->SMTPSecure="ssl";
		$mail->Port=465;
		$mail->SMTPKeepAlive=true;
		$mail->Mailer="smtp";
		$mail->setFrom("ryantemplemailer@gmail.com", "Ryan Batschelet");
		$mail->addReplyTo("ryantemplemailer@gmail.com", "Ryan Batschelet");
		$msg = "Example message";
		$mail->addAddress($ToEmailAddress, "Your name");
		$mail->Subject = "Your subejceter";
		$mail->Body = $msg;
		$mail->send();
		print "Email sent ... <br>";
		$_SESSION["RegState"] = 3;
		$_SESSION["Message"] = "message sent";
		exit();

	}
	catch(phpmailerException $e)
	{
		$_SESSION["Message"] = "Mailer error: " . $e->errorMessage();
		$_SESSION["RegState"] = -4;
		print "Mail send failed" . $e->errorMessage;


	}

	exit();

?>
