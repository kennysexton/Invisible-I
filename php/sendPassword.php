<?php	//program that i made because i was confused about what forgetPassword was supposed to do
	session_start();
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
	// Create a query
	$_SESSION["Message"] = " Forgotten password email sent to $Email";

	//Retrieving the password for the account associated with the email
	$query = "SELECT Password FROM Users WHERE Email='$Email';";
	$result = mysqli_query($con, $query);
	if(!$result)
	{
		$_SESSION["RegState"] = -10;
		
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../index.php");
		exit();
	}
	
	$row = mysqli_fetch_row($result);
	$password = $row[0];
	
	
	//Sending an email letting the user find out their forgotten password
	$msg = "The password for your account $Email is $password";
	//Ready to send email
	$to = $Email;
	$subject = "Forgotten Password";
	$headers = "Ryan Batschelet Lab 2 Forgotten Password Email";
	mail($to, $subject, $msg, $headers);

	header("location: ../index.php");
	exit();

?>