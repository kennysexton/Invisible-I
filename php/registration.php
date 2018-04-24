<?php	//Program that activates when the user tries to create an account. Creates a row for them in the Users table, and sends an email that will allow them to authenticate their account
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
		$_SESSION["RegState"] = -1;

		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	// Generates an authentication code
	$Acode = rand();
	//Gets the time of the day the account was created
	$Rdatetime = date("Y-m-d h:i:s");
	//Query for adding the user into mysql table Users
	$query = "INSERT into InvisibleUsers (Email,Status,Acode,Rdatetime) values ('$Email', 0, '$Acode', '$Rdatetime');";
	//Makes sure the query executes properly
	$result = mysqli_query($con, $query);
	if(!$result)
	{
		$_SESSION["RegState"] = -2;

		$_SESSION["Message"] = "Insert failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	echo "Insert worked !!! <br>";
	//Prepare email to authenticate
	$msg = "Please click on the link to set password for your account:".
		"http://cis-linux2.temple.edu/~tug83270/lab2/php/authenticate.php?Email=$Email&Acode=$Acode";
	//Ready to send email
	$to = $Email;
	$subject = "registration test";
	$headers = "Ryan Batschelet Lab 2 Authentication Email";
	//mail($to, $subject, $msg, $headers);
	phpMailer($to, "ryantemplemailer@gmail.com", "Xvtwxvtw204", $msg, $subject);
	echo "test1 <br>";
	
	$_SESSION["RegState"] = 1;
	//Updates the status of the user to "registered"
	$query = "Update InvisibleUsers set Status = 1 where Email = '$Email';";
	$result = mysqli_query($con, $query);
	if(!$result)
	{
		$_SESSION["RegState"] = -3;
		
		$_SESSION["Message"] = "User status update failure: ".mysqli_error($con);
	}
	else
		$_SESSION["Message"] = "User status update successful";
	header("location: ../login.php");
	exit();
	
?>
