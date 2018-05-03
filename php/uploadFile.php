<?php

	session_start();
	$target_dir = "../uploads/";
	// $file_name = $_FILES['file']['name'];

	print "cp1 <br>";

	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/".$_FILES['file']["name"])){
			print "cp3 <br>";
		}
		else {
			print "Error: ".UPLOAD_ERR_OK;	
		}
	}

	echo '<pre>';
	
	print "<br>";
	chdir('../ExifRead-2.1.2/');
	print "cp4 <br>";
	exec('pwd', $out1);
	var_dump($out1);
	print "<br>";
	exec('./EXIF.py ../uploads/file1.jpg 2>&1', $out);
	var_dump($out);
	echo '</pre>';
	
	
	
	$_SESSION["view"] = 1;
	header ('location: ../results.php');
	exit();
	


?>
