<?php
print "cp0 <br>";
$target_dir = "../uploads/";

print "cp1 <br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	print "cp2 <br>";
			
			if (move_uploaded_file($_FILES['fileInput']['tmp_name'],  $target_dir))
			{
				print "cp3 <br>";
				echo 'file uploaded';
			}
			
}
?>