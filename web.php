<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "web_form_application";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$full_name = $_POST['fname'];
$registration_number = $_POST['reg_number'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$country = $_POST['country'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

// Debug: Output form data
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registration (full_name, registration_number, phone, course, country, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssssss", $full_name, $registration_number, $phone, $course, $country, $email, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
