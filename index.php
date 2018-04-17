<?php
	session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Invisible I</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,500" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>	
	<body>
		
		<div class="center">
			<div class="top">
				<h5 class="preview" id="filename">No file</h5>
			</div>
			<div class="card">
				<div class="content">
					<h1>Upload image</h1>
					<img class="arrow" src="icons/arrow.svg">
				</div>
			</div>
			<div class="des">
				<p>Invisible eye is a tool that displays <a href="https://en.wikipedia.org/wiki/Exif">EXIF</a> metadata associated with jpeg images.</p>
			</div>
			<div class="footer">
				<a href="https://github.com/kennysexton/Invisible-I"><img class="git" src="icons/github.svg"></a>
			</div>
			
		</div>
		<input type="file" id="fileInput" accept=".jpg, .jpeg">
		
		<!-- scripts -->
		<script src="js/main.js"></script>
		
	</body>
</html>

