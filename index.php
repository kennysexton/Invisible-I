<?php
	session_start();
	if($_SESSION["RegState"] == 7)	
	{	
		header("location: suspended.html");	
		exit();	
	}	
	
	
	if (!isset($_SESSION["RegState"]) || ( $_SESSION["RegState"] != 4 && $_SESSION["RegState"] != 5)) {
		header("location: login.php");
		exit();
	}
	
	echo '<pre>';
	chdir('./uploads');
	exec('rm *', $out1);
	echo '</pre>';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Invisible I</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,500" rel="stylesheet">
		<link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>	
	<body>
		<!-- Upload -->
		<div id="upload" class="center">
			<div class="top">
				<h5 class="preview" id="filename">No file</h5>
			</div>
<<<<<<< HEAD
			<form action="http://cis-linux2.temple.edu/~tuf92968/lab4/php/uploadFile.php" id="form" method="post" enctype="multipart/form-data" target="iframe">
=======
			
			<form action="http://cis-linux2.temple.edu/~tuf92968/lab4/php/logout.php" method="get" class="top" id="right">
				<div class="logout" id="logout">Logout<input type="submit"/></div>
			</form>
			
			<form action="http://cis-linux2.temple.edu/~tuf92968/lab4/php/uploadFile.php" id="form" method="post" enctype="multipart/form-data" target="iframe">
>>>>>>> 50a0348bc2b3a74d20d9ec5c4ded482fd7695f43
				<div class="card" id="card">
					<div class="content">
						<h1 id="action-text">Upload image</h1>
						<img id="main-icon" class="arrow" src="icons/upload.svg">
						<!-- <button id="btn" type="submit"></button> -->
						
					</div>
				</div>
				<input type="file" id="file" name="file" accept=".jpg, .jpeg">
				<!-- <input type="submit" value="Submit"> -->
			</form>
			<div class="des">
				<p>Invisible eye is a tool that displays <a href="https://en.wikipedia.org/wiki/Exif">EXIF</a> metadata associated with jpeg images.</p>
			</div>
			
-			<?php	
-				if($_SESSION["RegState"] == 5)	
-				{	
-					echo "<a href=\"admin.php\">Admin Page</a>";	
-						
-				}	
-				
-			?>			
			
			<div class="footer">
				<a href="https://github.com/kennysexton/Invisible-I"><img class="git" src="icons/github.svg"></a>
			</div>
		</div>
		<!-- scripts -->
		<script src="js/main.js"></script>
		
	</body>
</html>

