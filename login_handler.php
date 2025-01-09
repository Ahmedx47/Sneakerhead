<?php
// Include the database connection file
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the user data
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Successful login
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php"); // Redirect to homepage
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid password!'); window.location.href = 'login.php';</script>";
        }
    } else {
        // Username not found
        echo "<script>alert('Username not found!'); window.location.href = 'login.php';</script>";
    }
}

$conn->close();
?>
