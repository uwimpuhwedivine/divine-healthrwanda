<?php
// Database configuration for Divine project
$servername = "divine-db";
$username = "root";
$password = "rootpassword";
$dbname = "health_rwanda";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8mb4");
?>