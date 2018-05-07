<?php
	session_start();
	
	if (!isset($_SESSION["RegState"]) || ($_SESSION["RegState"] != 4 && $_SESSION["RegState"] != 5)) {
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
	
	function divide($string){
		
		
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
			
			 <?php /*
			echo '<pre>';
			print_r($_SESSION);
			echo '</pre>';  */
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
				  <td><?php	$res = explode(" ", $_SESSION["dataArray"][getIndex('EXIF DateTimeOriginal (ASCII)')]);
				  
				  	end($res);
					echo prev($res);
					?>
				  
				  <td>
				</tr>
				
				<tr>
				  <th scope="row">Time Taken</th>
				  <td><?php	echo end(explode(" ", $_SESSION["dataArray"][getIndex('EXIF DateTimeOriginal (ASCII)')]))?><td>
				</tr>
				
				<tr>
				  <th scope="row">DPI</th>
				  <td><?php	echo end(explode(":", $_SESSION["dataArray"][getIndex('Image XResolution (Ratio)')]))?><td>
				</tr>
				
				<tr>
				  <th scope="row">Focal Length</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF FocalLength (Ratio)')])).mm ?></td>
				</tr>
				<tr>
				  <th scope="row">F-Stop</th>
				  <td><?php echo 'f'.end(explode(":", $_SESSION["dataArray"][getIndex('EXIF FNumber (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">Shutter Speed</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF ExposureTime (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">ISO</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF ISOSpeedRatings')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">White Balance</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF WhiteBalance')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">Flash</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('EXIF Flash (Short)')])) ?></td>
				</tr>
			  </tbody>
			</table>
			
			<table class="table">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">GPS</th>
				  <th scope="col"></th>
				 
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">Latitude</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('GPS GPSLatitudeRef (ASCII)')])).' '.end(explode(":", $_SESSION["dataArray"][getIndex('GPS GPSLatitude (Ratio)')])) ?></td>
				</tr>
				<tr>
				  <th scope="row">Longitude</th>
				  <td><?php echo end(explode(":", $_SESSION["dataArray"][getIndex('GPS GPSLongitudeRef (ASCII)')])).' '.end(explode(":", $_SESSION["dataArray"][getIndex('GPS GPSLongitude (Ratio)')])) ?></td>
				</tr>
			  </tbody>
			</table>
			
			</div>
		</div>
		
		<!-- scripts -->
		<script src="js/main.js"></script>
		
	</body>
</html>