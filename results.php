<?php
	session_start();
	
	if (!isset($_SESSION["RegState"]) || $_SESSION["RegState"] != 4) {
		header("location: login.php");
		exit();
	}
	
	$arrlength = count($_SESSION["dataArray"]);
	
	// function getIndex(){
		// for ($x = 0; $x< $arrlength; $x++){
			// echo $_SESSION["dataArray"][$x];
			// echo <br>;

		// }
		
	// }
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Invisible I</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,500" rel="stylesheet">
			<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>	
	<body>
	
	
			<!-- Results -->
		<div id ="results" class="center">
			<a href="index.php"><img id="back" src="icons/arrow_white.svg"></a>
			
			
			<img id="thumb" class="top" src="uploads/file1?nocache=<?php echo time(); ?>">
			
			<?php
			echo '<pre>';
			print_r($_SESSION);
			echo '</pre>';
			?>
			
			<!-- Table -->
			<div class="table-width">
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Camera</th>
				  <th scope="col"></th>
				 
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">Manufacturer</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"]['42'])) ?></td>

				</tr>
				<tr>
				  <th scope="row">Model</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"]['43'])) ?></td>

				</tr>
			  </tbody>
			</table>
			
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Lens</th>
				  <th scope="col"></th>
				 
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">Manufacturer</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"]['42'])) ?></td>

				</tr>
				<tr>
				  <th scope="row">Model</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"]['43'])) ?></td>

				</tr>
			  </tbody>
			</table>
			</div>

		</div>
		
		<!-- scripts -->
		<script src="js/main.js"></script>
		
	</body>
</html>