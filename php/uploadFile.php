<?php
	session_start();
	$_SESSION["dataArray"] = NULL;
	$target_dir = "../uploads/";
	$temp = explode(".", $_FILES["file"]["name"]);
	$file_name = "file1". '.' . strtolower(end($temp));
	

	print "cp1 <br>";

	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/".$file_name)){
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
	chmod($file_name, 777);
	exec('./EXIF.py ../uploads/'.$file_name.' 2>&1', $out);
	$_SESSION["dataArray"] = $out;
	var_dump($out);
	echo '</pre>';
	
	
	header ('location: ../results.php');
	
	print "fin";
	exit();
	


?>
