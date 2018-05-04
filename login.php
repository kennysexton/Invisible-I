<?php
	session_start();
	//Use $_SESSION["RegState"] to control views
	if(!isset($_SESSION["RegState"]))
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
	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CIS3238 Lab 2 Ryan Batschelet">
    <meta name="author" content="Ryan Batschelet">
	
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link rel="icon" href="imgs/i-eye.jpg">

    <title>Invisible I</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
	<script>
		$(document).ready(function()	
		{
			var RegState = <?php echo $_SESSION["RegState"];?>;
			alert("RegState = ["+RegState+"]");		//Getting the state of the user
			if(RegState != 2 && RegState != 6 && RegState != -11 && RegState != -8)
			{										//Puts the user in the LoginView
				$("#LoginView").show();
				$("#SetPasswordView").hide();
				$("#ResetPasswordView").hide();
				$("#ForgetPasswordView").hide();
				$("#RegistrationView").hide();
			}
			else if(RegState == 2 || RegState == -8)
			{										//Puts the user in the SetPasswordView
				$("#LoginView").hide();
				$("#SetPasswordView").show();
				$("#ResetPasswordView").hide();
				$("#ForgetPasswordView").hide();
				$("#RegistrationView").hide();							
			}
			else if(RegState == 6 || RegState == -11)
			{										//Puts the user in the ResetPasswordView
				$("#LoginView").hide();
				$("#SetPasswordView").hide();
				$("#ResetPasswordView").show();
				$("#ForgetPasswordView").hide();
				$("#RegistrationView").hide();							
			}
			
			$("#Registration").click(function(){
			{										//Puts the user in the RegistrationView if they click the register button
				$("#LoginView").hide();
				$("#SetPasswordView").hide();
				$("#ResetPasswordView").hide();
				$("#ForgetPasswordView").hide();
				$("#RegistrationView").show();
			};
			});
			$("#ForgetPassword").click(function(){
			{										//Puts the user in the ForgetPasswordView if they click the forget password button				
				$("#LoginView").hide();
				$("#SetPasswordView").hide();
				$("#ResetPasswordView").hide();
				$("#ForgetPasswordView").show();
				$("#RegistrationView").hide();
			};				
			});
			$(".Lab2Back").click(function(){
			{										//Brings the user back into the LoginView if they click the back button
				$("#LoginView").show();
				$("#SetPasswordView").hide();
				$("#ResetPasswordView").hide();
				$("#ForgetPasswordView").hide();
				$("#RegistrationView").hide();
			};
			});
		});
	</script>
  <body class="text-center">
    <form id="LoginView" action="php/login.php" class="form-signin" method="post">
      <img class="mb-4" src="imgs/i-eye.jpg" alt="" width="173" height="172">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <button id="SignIn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <button id="Registration" class="btn btn-lg btn-primary btn-block" type="button">Create Account</button>
	  <button id="ForgetPassword" class="btn btn-lg btn-primary btn-block" type="button">Forget Password?</button>


      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!--SetPasswordView -->
    <form id="SetPasswordView" action="php/setPassword.php" class="form-signin" method="post">
      <img class="mb-4" src="images/i-eye.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Set New Password</h1>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="passwordone" id="inputPassword" class="form-control" placeholder="Password" required>
	        <label for="inputPassword" class="sr-only">Confirm Password</label>
      <input type="password" name="passwordtwo" id="inputPassword" class="form-control" placeholder="Confirm Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!--ResetPasswordView-->
    <form id="ResetPasswordView" action="php/resetPassword2.php" class="form-signin" method="post">
      <img class="mb-4" src="images/i-eye.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Set New Password</h1>
	        <label for="inputPassword" class="sr-only">New Password</label>
      <input type="password" name="passwordone" id="inputPassword" class="form-control" placeholder="New Password" required>
      <label for="inputPassword" class="sr-only">Confirm Password Password</label>
      <input type="password" name="passwordtwo" id="inputPassword" class="form-control" placeholder="Confirm Password" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!--RegistrationView-->
    <form id="RegistrationView" action="php/registration.php" class="form-signin" method="post">
      <img class="mb-4" src="images/i-eye.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Give Email for New Account</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      <button class="btn btn-sm btn-info btn-block Lab2Back" type="button">Back</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    <!--ForgetPasswordView-->
    <form id="ForgetPasswordView" action="php/forgetPassword.php" class="form-signin" method="post">
      <img class="mb-4" src="images/i-eye.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Forget Password</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Send Email</button>
      <button class="btn btn-sm btn-info btn-block Lab2Back" type="button">Back</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
	<div class="alert alert-warning" id="MessageBoard">
		<?php echo $_SESSION["Message"];?>
	</div>
  </body>
</html>
