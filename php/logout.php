<?php
	session_start();
	//Use $_SESSION["RegState"] to control views
	$_SESSION["RegState"] = 0;
	//View 0: Login view with registration button
	//View 1: Registration view, email and acode sent
	//View 2: Email and Authcode verified
	//View 3: Password Saved
	//View 4: Logged in
	//RegState < 0: Some sort of error
	//RegState = 0: Not registered
	//RegState = 1: Registered and email sent
	//RegState = 2: Authenticated
	//RegState = 3: Password Set
	//RegState = 4: Logged in
	//RegState = 5: Logged in and Admin
	//RegState = 6: Password is being reset
	header ('location: ../login.php');
	
?>