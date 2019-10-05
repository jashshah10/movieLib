<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movielib";

	$title = $_REQUEST['movietitle'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// sql to delete a record
	$sql = "DELETE FROM movie WHERE Title='$title'";

	if ($conn->query($sql) === TRUE) {
	    header('Location: '.'/myMovieLibrary/');
	} else {
	    echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>