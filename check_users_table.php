<?php
// Include the database connection file
include 'connect.php';

// SQL query to check if the 'users' table exists
$sql = "SHOW TABLES LIKE 'users'";

// Execute the query
$result = $conn->query($sql);

// Check the result
if ($result->num_rows == 1) {
    echo "The 'users' table exists!";
} else {
    echo "The 'users' table does not exist!";
}

// Close the connection
$conn->close();
?>
