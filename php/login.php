<?php	//program that activates when the user tries to log in. Makes sure they entered in the right password, and sends them to 2 different pages depending on if they are an admin or user
	session_start();
	require_once("config.php");
	// Fetch web data
	$email = $_POST["email"];
	$password = $_POST["password"];

	print "From PHP, I got email ($Email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	// Create a query to find a matching username and password

	$query = "SELECT * FROM InvisibleUsers WHERE Email='$email' AND Password='$password';";
	$result = mysqli_query($con, $query);
	if(!$result)
	{
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	
	
	//If there  is one corresponding username and password
	if(mysqli_num_rows($result) == 1)
	{
		$row = mysqli_fetch_row($result);		
		
		$_SESSION["RegState"] = 4;
		$_SESSION["Message"] = "You have logged in " . $_SESSION["RegState"];
		$_SESSION["Email"] = $email;
		//If they are an admin, it sends them to the admin page
		if($row[6] == 3)
		{
			$_SESSION["RegState"] = 5;
			$_SESSION["Message"] = "Admin session";
			
			
			header("location: ../admin.php");
			exit();
		}
				
		header("location: ../index.php");
		exit();
	}
	else
	{	//If no username and password combination is found they recieve an error message and get sent back to index.php
		$_SESSION["RegState"] = -9;
		
		$_SESSION["Message"] = "Incorrect username or password";
		
	}
	
	header("location: ../index.php");
	exit();
?>