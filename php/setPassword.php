<?php	
	//Program that allows the user to set their password. Activates in the SetPasswordView when the user clicks on the set password button
	session_start();
	

	$email = $_SESSION["Email"];
	$password1 = $_POST["passwordone"];
	$password2 = $_POST["passwordtwo"];
	
	require_once("config.php");
	// Fetch web data
	print "From PHP, I got email ($email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		$_SESSION["RegState"] = -1;
		
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	/*
	$userquery = "SELECT Password from Users where Email='$email';";
	
	
	$result = mysqli_query($con, $userquery);
	if(!$result)
	{
		$_SESSION["RegState"] = -7;
		
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../index.php");
		exit();
	}
	
	$row = mysqli_fetch_row($result);
	$password = $row[0];*/	
	
	//If both passwords match
	if($password1 == $password2)
	{
		//Sets the password and updates the status of the user
		$updatepassword = "UPDATE Users SET Password='$password1' WHERE Email='$email';";
		$result = mysqli_query($con, $updatepassword);
		$updatestatus = "UPDATE Users SET Status=2 WHERE Email='$email';";
		//If update password query fails
		if(!$result)
		{
			$_SESSION["RegState"] = -13;
			
			$_SESSION["Message"] = "Update failed: " . mysqli_error($con);
			header("location: ../index.php");
			exit();
		}		
		
		$result = mysqli_query($con, $updatestatus);
		//If update status query fails
		if(!$result)
		{
			$_SESSION["RegState"] = -14;
			
			$_SESSION["Message"] = "Update failed: " . mysqli_error($con);
			header("location: ../index.php");
			exit();
		}				
		$_SESSION["RegState"]=3;
		$_SESSION["Message"] = "$passwordone $passwordtwo set successfully";
		
	}
	else
	{
		$_SESSION["RegState"] = -8;
		
		$_SESSION["Message"] = "Password fields do not match";
		header("location: ../index.php");
		exit();		
	}
	
	//$_SESSION["Message"] = "Password set successfully";
	header("location: ../index.php");
	exit();
	
?>