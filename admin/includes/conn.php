<?php
	$conn = new mysqli('localhost', 'root', '', 'barangay');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>