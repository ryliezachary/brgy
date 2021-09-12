<?php
	// $conn = new mysqli('us-cdbr-east-04.cleardb.com:3306', 'bad6f482309708', 'e410cc68', 'heroku_b648a05cf138ff9');

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);
	
	$conn = new mysqli($server, $username, $password, $db);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

?>