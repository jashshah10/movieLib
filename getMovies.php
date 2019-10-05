<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movielib";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM movie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Title"]. "</td><td>" . $row["Dateofrelease"]."</td><td><form action='delmovie.php' class='delform'><input type='hidden' value='".$row["Title"]."' name='movietitle'><input type='submit' value='Delete' class='delbtn'></form></td></tr>";
    }
} else {
    echo "<tr><td>0 results</td><td></td><td></td></tr>";
}
$conn->close();
?>