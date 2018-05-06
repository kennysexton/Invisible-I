<?php
	session_start();
	
	if (!isset($_SESSION["RegState"]) || $_SESSION["RegState"] != 4) {
		header("location: login.php");
		exit();
	}
	

	
	
	
	function getIndex($string){
		$arrlength = count($_SESSION["dataArray"]);
		for ($x = 0; $x< $arrlength; $x++){
			if(strpos($_SESSION["dataArray"][$x], $string)!==false){
				$index = (string)$x;
				return $index;
			}
		}
	 echo "";
	}
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
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('Image Make (ASCII)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">Model</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('Image Model (ASCII)')])) ?></td>
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
				  <th scope="row">Model</th>
				  <td><?php	echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF LensModel (ASCII)')]))?></td>
				</tr>
			  </tbody>
			</table>
			
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">Image</th>
				  <th scope="col"></th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">Date Taken</th>
				  <td><?php	echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF DateTimeOriginal (ASCII)')]))?><td>
				</tr>
				<tr>
				  <th scope="row">focal length</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF FocalLength (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">f-stop</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF FNumber (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">shutter speed</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF ExposureTime (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">ISO</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF ISOSpeedRatings')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">Whtie Balance</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF WhiteBalance')])) ?></td>
				</tr>
			  </tbody>
			</table>
			</div>
		</div>
		
		<!-- scripts -->
		<script src="js/main.js"></script>
		
	</body>
</html>