<?php
	//Program that activates when the user clicks on the link sent by forgetPassword.php. Sends the user to the view where they can enter in their new password
	session_start();
	require_once("config.php");
	// Fetch web data
	$email = $_GET["Email"];
	$checkcode = $_GET["Acode"];

	print "From PHP, I got email ($email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	
	//Gets the authentication code stored in the MySQL row associated with the user
	$Acodequery = "SELECT Acode from InvisibleUsers where Email='$email';";
	
	$result = mysqli_query($con, $Acodequery);
	if(!$result)
	{
		$_SESSION["RegState"] = -12;
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	
	$row = mysqli_fetch_row($result);
	$thecode = $row[0];
	
	//Makes sure the authentication code in the mysql table matches the authentication code from the link
	if($checkcode == $thecode)
	{	
		$_SESSION["RegState"] = 6;
		$_SESSION["Message"] = "Link authenticated, set password";
		$_SESSION["Email"] = $email;
	}
	else
	{		//Lets the user know if the link did not have the proper authentication code
		$_SESSION["RegState"] = -6;
		$_SESSION["Message"] = "Account failed to authenticate, authentication code did not match $email $checkcode $thecode";
		
	}
	header("location: ../login.php");
	exit();	
?>