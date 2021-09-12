<?php
	$conn = new mysqli('us-cdbr-east-04.cleardb.com', 'bad6f482309708', 'e410cc68', 'heroku_b648a05cf138ff9');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>