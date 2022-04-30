<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "jobtest_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
/*if ($conn->connect_error) {
  die("Gagal terhubung ke database: " . $conn->connect_error);
}
echo "Terhubung ke database"; */
?>