<?php	//Program that is activated when the user clicks the link given to them by the email. Updates their status so that they are now authenticated, and sends them to the view that lets them set their password	

	//getting data from the URL
	$email = $_GET["Email"];
	$checkcode = $_GET["Acode"];

	session_start();
	$_SESSION["RegState"] = 1;
	require_once("config.php");
	// Fetch web data
	print "From PHP, I got email ($email) <br>";
	//Connect to MySQL
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if(!$con)
	{
		die("Connection Failure: " . mysqli_connect_error());
	}
	echo "Database connected !!! <br>";
	//Query for getting the authentication code
	$Acodequery = "SELECT Acode from InvisibleUsers where Email='$email';";
	//making sure the query worked
	$result = mysqli_query($con, $Acodequery);
	if(!$result)
	{
		$_SESSION["RegState"] = -10;		
		$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
		header("location: ../login.php");
		exit();
	}
	//Turning the result of the query into a usable integer
	$row = mysqli_fetch_row($result);
	$thecode = $row[0];
	//Making sure the Acode in the URL is the same as what is stored in the database
	if($checkcode == $thecode)
	{

		$_SESSION["RegState"] = 2;
		
		//Time of the authentication
		$time = date("Y-m-d h:i:s");
		
		//Query for setting the authentication time
		$Acodeset = "UPDATE InvisibleUsers SET Adatetime='$time' WHERE Email='$email';";
		$result = mysqli_query($con, $Acodeset);
		if(!$result)
		{
			$_SESSION["RegState"] = -15;		
			$_SESSION["Message"] = "Update failed: " . mysqli_error($con);
			header("location: ../index.php");
			exit();
		}		
		
		
		$_SESSION["Message"] = "Type in your new password";
		$_SESSION["Email"] = $email;
	}
	else
	{
		$_SESSION["RegState"] = -6;
		$_SESSION["Message"] = "Link is incorrect, authentication code did not match $email $checkcode $thecode";
		
	}
	header("location: ../login.php");
	exit();	
?>