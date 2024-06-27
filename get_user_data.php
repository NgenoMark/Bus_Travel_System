<?php
session_start();
$servername = "localhost";
$username = "root";  // Adjust if necessary
$password = "";  // Adjust if necessary
$dbname = "bus_commuter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];  // Assuming user_id is stored in session after login

$sql = "SELECT name, phone_number, email, profile_photo FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['profile_photo']) {
        $user['profile_photo'] = 'uploads/' . $user['profile_photo'];
    } else {
        $user['profile_photo'] = 'uploads/default_profile.jpeg';  // Default image if no profile photo
    }
    echo json_encode($user);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
