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

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE bookings SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking status updated successfully";
    } else {
        echo "Error updating booking: " . $conn->error;
    }

    $conn->close();
}
header("Location: admin.php");
exit();

$conn->close();

?>
