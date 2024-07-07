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
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $payment = $_POST['payment'];
    $pickup = $_POST['pickup'];

    $sql = "INSERT INTO bookings (name, location, price, date, time, payment_method, pickup_stage) VALUES ('$name', '$location', '$price', '$date', '$time', '$payment', '$pickup')";


    if ($conn->query($sql) === TRUE) {
        // Redirect to display page with query parameters
        header("Location: display_trip.php?name=$name&location=$location&price=$price&date=$date&time=$time&payment=$payment&pickup=$pickup&type=booking");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    //$stmt->close();
    $conn->close();
}
?>
