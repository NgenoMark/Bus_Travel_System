<?php
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $pickup_stage = $_POST['pickup_stage'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO trips (name, location, date, time, pickup_stage) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdssss", $name, $location, $date, $time, $pickup_stage);

    if ($stmt->execute()) {
        // Redirect to display page with query parameters
        header("Location: display_trip.php?name=$name&location=$location&date=$date&time=$time&pickup_stage=$pickup_stage&type=trip");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
