<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taitaja";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$sql = "SELECT * FROM renkaat WHERE renkaat.Koko='" . $_GET["size"] . "'";  
$result = $conn->query($sql);

$json_array = array();

if (!empty($result) && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row;
    }
}

echo json_encode($json_array);
$conn->close();
?>