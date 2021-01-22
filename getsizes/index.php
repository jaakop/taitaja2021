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

$sql = "SELECT DISTINCT Koko FROM renkaat ORDER BY Koko";
$result = $conn->query($sql);

$json_array = array();

if (!empty($result) && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $json_array[] = $row["Koko"];
    }
}
echo json_encode($json_array);
$conn->close();
?>