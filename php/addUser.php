<?php	//Program that activates when the user tries to create an account. Creates a row for them in the Users table, and sends an email that will allow them to authenticate their account
	session_start();
	require("phpMailerLab3.php");

	require_once("config.php");
	// Fetch web data
	$Email = $_POST["email"];
	$Password = $_POST["password"];
	$Value = $_POST["statusopt"];
	
	print "From PHP, I got email ($Email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	// Generates an authentication code
	$Acode = rand();
	//Gets the time of the day the account was created
	$Rdatetime = date("Y-m-d h:i:s");
	//Query for adding the user into mysql table Users
	$query = "INSERT into InvisibleUsers (Email,Password,Status) values ('$Email', '$Password', '$Value');";
	//Makes sure the query executes properly
	$result = mysqli_query($con, $query);
	if(!$result)
	{
		$_SESSION["RegState"] = -2;

		$_SESSION["Message"] = "Insert failed: " . mysqli_error($con);
		header("location: ../admin.php");
		exit();
	}
	echo "Insert worked !!! <br>";
	//Prepare email to authenticate

	
	$_SESSION["RegState"] = 1;
	header("location: ../admin.php");
	exit();
	
?>
