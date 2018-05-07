<?php	//lab1results table, ended up going unused and replaced by services.php
	session_start();
	//Use $_SESSION["RegState"] to control views
	if(!isset($_SESSION["RegState"]) || $_SESSION["RegState"] != 5)
		{
		header("location: index.php");
		exit();
		
	}
	//View 0: View Table of All Users
	//View 1: Edit selected user
	//View 2: Add new user


	//RegState = 0: Not registered
	//RegState = 1: Registered and email sent
	//RegState = 2: Authenticated
	//RegState = 3: Password Set
	//RegState = 4: Logged in
	//RegState = 5: Logged in and Admin
	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Invisible I Admin Page">
    <meta name="author" content="Ryan Batschelet">
	
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link rel="icon" href="images/i-eye.jpg">

    <title>Invisible I Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

	<script>
	
		$(".userSelection").click(function()
		{
			
			
		});
	
		$(document).ready(function()	
		{
			$("#ShowUsersView").show();
			$("#AddUserView").hide();
			$("#EditUserView").hide();

			
			$(".ShowUserTable").click(function(){
			{										//Puts the user in the RegistrationView if they click the register button
				$("#ShowUsersView").show();
				$("#AddUserView").hide();
				$("#EditUserView").hide();
			};
			});
			$("#EditUser").click(function(){
			{										//Puts the user in the RegistrationView if they click the register button
				$("#ShowUsersView").hide();
				$("#AddUserView").hide();
				$("#EditUserView").show();
				/*var possibleusers = document.getElementsByClassName("useropt");
				for(var i = 0; i < possibleusers.length + 1; i++)
				{
					alert("test" + i + possibleusers[i].checked);
					console.log(i);
					if(possibleusers[i].checked)
					{
						console.log("ok");
						document.getElementsByClassName("HiddenUserID").setAttribute("value", possibleusers[i].value);
						document.getElementById("UserID").innerHTML = "User ID" + possibleuser[i].value;
						
						
						break;
					}
					
				}*/
				
				var selecteduser = document.querySelector('input[name = "useropt"]:checked').value;
				
				alert(selecteduser);
				var editformvalues = document.getElementsByClassName("HiddenUserID");
				for(var i = 0; i < editformvalues.length; i++)
				{
					editformvalues[i].setAttribute("value", selecteduser);
				}
				document.getElementById("UserID").innerHTML = "User ID " + selecteduser;

				
			};
			});
			$("#AddUser").click(function(){
			{										//Puts the user in the RegistrationView if they click the register button
				$("#ShowUsersView").hide();
				$("#AddUserView").show();
				$("#EditUserView").hide();
			};
			});			
		});
	</script>  
  
  <body class="text-center">
    <form id="ShowUsersView">


	
		<table class="table table-bordered">
			<tr>
				<th>User ID</th>
				<th>User Email</th> 
				<th>User Status</th>
				<th>Select User</th>
			</tr>	
		
			<?php
				$email = $_SESSION["Email"];

				session_start();
				require_once("php/config.php");
				// Fetch web data
				//print "From PHP, I got email ($email) <br>";
				//Connect to MySQL
				$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
				if(!$con)
				{
					die("Connection Failure: " . mysqli_connect_error());
				}
				//echo "Database connected !!! <br>";
				//Sending a query to the database
				$resultsquery = "SELECT * from InvisibleUsers;";
	
				$result = mysqli_query($con, $resultsquery);
				if(!$result)
				{
					$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
					exit();
				}
				
				$rownum=0;
				//Prints out lab 1 results
				while($row = mysqli_fetch_row($result))
				{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[6]</td>";
					if($row[6] != 3)
					{
					echo "<td>
						<div class=\"radio useropt\"><label><input type=\"radio\" name=\"useropt\" value=\"$row[0]\" checked=\"checked\"></label></div>
						</td>";
					}
					
					echo "</tr>";
				}
			
				$_SESSION["RegState"] = 3;
			
			?>
		
		</table>
		<button id="EditUser" class="btn btn-lg btn-primary btn-block" type="button">Edit / Delete Selected User</button>
	
		<button id="AddUser" class="btn btn-lg btn-primary btn-block" type="button">Add New User</button>
	

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
	
	
	<form id="AddUserView" action="php/addUser.php" class="form-signin" method="post">
	
		<div class = "col-xs-3">
			<button class="ShowUserTable btn btn-lg btn-primary btn-block" type="button">Go Back</button>
			<br>

			<label for="inputEmail" class="sr-only">Email address</label>		
			<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	  

			<label for="inputPassword" class="sr-only">Password</label>	
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
	
	
			<label class="radio-inline"><input type="radio" value="-1" name="statusopt">Suspended</label>
			<label class="radio-inline"><input type="radio" value="1" name="statusopt" checked="checked">Basic User</label>
			<label class="radio-inline"><input type="radio" value="2" name="statusopt">Admin</label>

			<br>
		
			<button class="btn btn-lg btn-primary " type="submit">Create User</button>
		</div>
	</form>
	
	<div id="EditUserView">
	
			<button id="UserID" class="btn btn-lg btn-primary btn-block">Example Text</button>	
			<button class="ShowUserTable btn btn-lg btn-primary btn-block" type="button">Go Back</button>
			<br>
			<form id="ChangeEmailForm" action="php/editEmail.php" class="form-signin" method="post">
			<input class="HiddenUserID" type="hidden" name="ID">
			
			<div class = "col-xs-3">
		
				<label for="inputEmailTwo" class="sr-only col-xs-3">Email address</label>
				<input type="email" name="email" id="inputEmailTwo" class="form-control" placeholder="Email address" required autofocus>
				<br>
				<button class="btn btn-lg btn-primary" type="submit">Change Email</button>
				<br>
			</div>
			</form>
		
			<form id="ChangePasswordForm" action="php/editPassword.php" class="form-signin" method="post">
			<input class="HiddenUserID" type="hidden" name="ID">

			<div class = "col-xs-3">
	
			<hr />

				<label for="inputPasswordTwo" class="sr-only">Password</label>	
				<input type="password" name="password" id="inputPasswordTwo" class="form-control" placeholder="Password" required>
				<br>
				<button class="btn btn-lg btn-primary" type="submit">Change Password</button>
				<br>
			</div>
			</form>
		
			<form id="ChangeStatusForm" action="php/editStatus.php" class="form-signin" method="post">
			<input class="HiddenUserID" type="hidden" name="ID">
			
			<div class = "col-xs-3">
			
			<hr />

				<label class="radio-inline"><input type="radio" name="statusopt" value="-1">Suspended</label>
				<label class="radio-inline"><input type="radio" name="statusopt" checked="checked" value="1">Basic User</label>
				<label class="radio-inline"><input type="radio" name="statusopt" value="2">Admin</label>	
				<br>
				<button class="btn btn-lg btn-primary" type="submit">Change Status</button>
			</div>
			</form>
			<hr />
			
			<form id="DeleteUserForm" action="php/deleteUser.php" class="form-signin" method="post">
				<input class="HiddenUserID" type="hidden" name="ID">
			
				<button class="btn btn-lg btn-primary" type="submit">Delete This User</button>
			</form>
	
	</div>	
	
	<div class="alert alert-warning" id="MessageBoard">
		<?php echo $_SESSION["Message"];?>
	</div>
</html>