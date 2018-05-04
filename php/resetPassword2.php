<?php	
	//Program that lets the user change their password. Activates when you click the proper button in the ResetPasswordView form
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
	//Query that gets the users password from the database.
	$userquery = "SELECT Password from InvisibleUsers where Email='$email';";
	
	
	$result = mysqli_query($con, $userquery);
	if(!$result)
	{
		$_SESSION["RegState"] = -7;
		
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	
	$row = mysqli_fetch_row($result);
	$password = $row[0];	
	
	//If both passwords that the user entered into the form matches
	if($password1 == $password2)
	{
		//Sets the password
		$updatepassword = "UPDATE InvisibleUsers SET Password='$password1' WHERE Email='$email';";
		$result = mysqli_query($con, $updatepassword);
		$_SESSION["RegState"]=3;
		$_SESSION["Message"] = "$passwordone $passwordtwo set successfully";
		
	}
	else
	{	//If the passwords do not match, it tells the user and goes back to the ResetPasswordView
		$_SESSION["RegState"] = -11;
		
		$_SESSION["Message"] = "Password fields do not match";
		header("location: ../login.php");
		exit();		
	}
	
	//$_SESSION["Message"] = "Password set successfully";
	header("location: ../login.php");
	exit();
	
?>