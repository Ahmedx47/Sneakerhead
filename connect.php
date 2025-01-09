<?php
// Database connection configuration
$servername = "localhost"; // Server name (default: localhost for XAMPP)
$username = "root";        // MySQL username (default: root for XAMPP)
$password = "";            // MySQL password (default: empty for XAMPP)
$dbname = "sneakerheads";  // Name of the database to connect to

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the 'users' table exists for signup and login functionality
$tableCheckQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if (!$conn->query($tableCheckQuery)) {
    die("Error creating or verifying table: " . $conn->error);
}

// Optional: Uncomment the following line to confirm connection success during testing
// echo "Connected successfully and table verified!";
?>
