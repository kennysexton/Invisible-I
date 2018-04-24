<?php	//lab1results table, ended up going unused and replaced by services.php
	session_start();
	//Use $_SESSION["RegState"] to control views
	if(!isset($_SESSION["RegState"]))
		$_SESSION["RegState"] = 0;
	//View 0: Login view with registration button
	//View 1: Registration view, email and acode sent
	//View 2: Email and Authcode verified
	//View 3: Password Saved
	//View 4: Logged in

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
    <meta name="description" content="Lab 1 Results Ryan Batschelet">
    <meta name="author" content="Ryan Batschelet">
	
	<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <link rel="icon" href="../images/milksteak.jpg">

    <title>Lab 2</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form id="LoggedinView">

		<table class="table table-bordered">
			<tr>
				<th>Loop Order</th>
				<th>Size</th> 
				<th>W</th>
			</tr>	
		
			<?php
				$email = $_SESSION["Email"];

				session_start();
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
				//Sending a query to the database
				$resultsquery = "SELECT * from Lab1Results;";
	
				$result = mysqli_query($con, $resultsquery);
				if(!$result)
				{
					$_SESSION["Message"] = "Retrieval failed: " . mysqli_error($con);
					exit();
				}
	
				//Prints out lab 1 results
				while($row = mysqli_fetch_row($result))
				{
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
				}
			
				$_SESSION["RegState"] = 3;
			
			?>
		
		</table>
	

      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
	<div class="alert alert-warning" id="MessageBoard">
		<?php echo $_SESSION["Message"];?>
	</div>
</html>