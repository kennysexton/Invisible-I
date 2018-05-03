<?php	//Program that sends a link that lets the user reset their password if they forgot it
	session_start();
	require("phpMailerLab3.php");	
	require_once("config.php");
	// Fetch web data
	$Email = $_POST["Email"];
	print "From PHP, I got email ($Email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	
	// Generate a random authentication code
	$Acode = rand();
	//Inserting a new authentication code
	$query = "UPDATE InvisibleUsers SET Acode=$Acode WHERE Email='$Email';";
	echo $query;
	$result = mysqli_query($con, $query);
	//Testing to see if the query succeeded
	if(!$result)
	{
		$_SESSION["RegState"] = -2;

		$_SESSION["Message"] = "Insert failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	
	//Prepare email to authenticate
	$msg = "Please click on the link to set password for your account:".
		"http://cis-linux2.temple.edu/~tug83270/Invisible-I/php/resetPassword.php?Email=$Email&Acode=$Acode";
	//Ready to send email
	$to = $Email;
	$subject = "Reset Password";
	$headers = "Invisible I Reset Password Email";
	phpMailer($to, "ryantemplemailer@gmail.com", "Xvtwxvtw204", $msg, $subject);
	$_SESSION["Email"] = $Email;

	header("location: ../login.php");
	exit();
?>
