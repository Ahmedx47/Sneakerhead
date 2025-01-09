<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
// Include the database connection file
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; // Do not escape this; we hash it

    // Validate inputs (Optional: Add more validation as needed)
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required!'); window.location.href = 'signup.php';</script>";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the users table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page on successful signup
        header("Location: login.php");
        exit();
    } else {
        // Handle database errors
        echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'signup.php';</script>";
    }
}

$conn->close();
?>
