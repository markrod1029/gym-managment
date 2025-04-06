
<?php
	$conn = new mysqli('localhost', 'root', '', 'gymnsb');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>
