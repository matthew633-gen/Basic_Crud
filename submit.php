<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$host = 'localhost';
$user = 'root';
$pass = ''; // Use a secure password in production
$db   = 'contact_db'; // Schema name

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get POST data with sanitization
$name    = htmlspecialchars(trim($_POST['name'] ?? ''));
$email   = htmlspecialchars(trim($_POST['email'] ?? ''));
$subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

// Simple validation
if ($name && $email && $subject && $message) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address.');window.history.back();</script>";
        exit;
    }

    // Input length validation
    if (strlen($name) > 100 || strlen($email) > 100 || strlen($subject) > 150 || strlen($message) > 500) {
        echo "<script>alert('Input too long.');window.history.back();</script>";
        exit;
    }

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        // Redirect to a success page or show a success message
        // Make sure success.html exists in the same directory!
        header("Location: success.html");
        exit;
    } else {
        // Log error to a file instead of displaying
        error_log("Database error: " . $stmt->error);
        echo "<script>alert('An error occurred, please try again later.');window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('All fields are required.');window.history.back();</script>";
}

$conn->close();
?>