<?php

$servername = "localhost";
$username = "ShenaniganWorker";
$password = "T42_Eb3P=rK+";
$dbname = "dom_shenanigans";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM visitors";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "IP: " . $row["ip"]. " - Visits: " . $row["visits"]. " - Notes: " . $row["notes"]. "<br>";
    }
} else {
    echo "0 results";
}



$sql = "SELECT SUM(`visits`) as `total`, COUNT(`ip`) as `unique` FROM visitors";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Total: " . $row["total"] . " - Unique: " . $row["unique"] . "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();