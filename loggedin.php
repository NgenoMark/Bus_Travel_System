<?php
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

// Insert data into the database
$sql = "INSERT INTO registration (full_name, registration_number, phone, course, country, email, password)
VALUES ('$full_name', '$registration_number', '$phone', '$course', '$country', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
