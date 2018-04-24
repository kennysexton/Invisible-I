<?php		//Nothing to see here, just a page that you are allowed to access if your user status is set to 3
	session_start();

	//Kick out the user if they dont have admin priveledges
	if(!isset($_SESSION["RegState"]) || $_SESSION["RegState"] != 5)
	{
		header("location: ../index.php");
		exit();
		
	}

	echo "This is the admin page!";
?>