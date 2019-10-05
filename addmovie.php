<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movielib";

	$title = $_REQUEST['movietitle'];
	$dateofrel = $_REQUEST['releasedate'];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// $sql = "INSERT INTO movie(Title,Dateofrelease)
	// VALUES ('$title','$dateofrel')";

	$sql = "INSERT IGNORE INTO movie(Title,Dateofrelease)
   	 VALUES('$title','$dateofrel')";

	if ($conn->query($sql) === TRUE) {
	    echo "the movie has successfully been added to recommendations";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>