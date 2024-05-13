<?php
$ip;
if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
{
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
	$ip = $_SERVER['REMOTE_ADDR'];
}

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

$dateNow = date("Y-m-d H:i:s");

$sql = "INSERT INTO visitors (ip, visits, latest_visit)
VALUES ('" . $ip . "', 1, '" . $dateNow . "') 
ON DUPLICATE KEY UPDATE visits = visits + 1, latest_visit = '" . $dateNow . "';";

if ($conn->query($sql) === TRUE) {
    echo "Oh look a visitor!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();    