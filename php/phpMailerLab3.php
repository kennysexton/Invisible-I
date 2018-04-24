<?php
	print "test20";


	//session_start();
	//require_once("config.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;
	
	print "test2";

	
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';// Build thePHPMailer 
	
	print "test3";
	
	function phpMailer($ToEmailAddress, $SourceAddress, $SourcePassword, $Message, $Subject)
	{
		
		print "test4";

		$mail= new PHPMailer(true);
		try 
		{ 
	
			$mail->SMTPDebug = 2;// Wants to see all errors
						print "test5";

			$mail->IsSMTP();
			print "test5";

			$mail->Host="smtp.gmail.com";
			print "test51";
			$mail->SMTPAuth=true;
			print "test52";
			$mail->Username=$SourceAddress;
			print "test53";
			$mail->Password = $SourcePassword;
			print "test54";
			$mail->SMTPSecure = "ssl";
			print "test55";
			$mail->Port=465;
			print "test56";
			$mail->SMTPKeepAlive = true;
			print "test57";
			$mail->Mailer = "smtp";
			print "test58";
			$mail->setFrom($SourceAddress, "Invisible I");
			print "test59";
			$mail->addReplyTo($SourceAddress,"Invisible I");
			print "test511";
			$mail->addAddress($ToEmailAddress,"Invisible I Visitor");
			print "test512";
			$mail->Subject = $Subject;
			print "test513";
			$mail->Body = $msg;
			print "test515";
			$mail->send();
			print "test514";

			print "Email sent ... <br>";
			$_SESSION["RegState"] = 3;
			$_SESSION["Message"] = "Email sent.";
			header("location:../index.php");
			exit();
		} 
		catch (phpmailerException $e) 
		{
			
			$_SESSION["Message"] = "Mailer error: ".$e->errorMessage();
			$_SESSION["RegState"] = -4;
			print "Mail send failed: ".$e->errorMessage;
		}
		header("location:../index.php");
		exit();
	}

?>