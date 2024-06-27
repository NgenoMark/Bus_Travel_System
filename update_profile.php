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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Handle file upload if profile photo is updated
    if (!empty($_FILES["profile_photo"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_photo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
                $profile_photo = $target_file;
                // Update profile with photo
                $stmt = $conn->prepare("UPDATE users SET name = ?, phone_number = ?, email = ?, profile_photo = ? WHERE user_id = ?");
                $stmt->bind_param("ssssi", $name, $phone_number, $email, $profile_photo, $user_id);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // Update profile without photo
        $stmt = $conn->prepare("UPDATE users SET name = ?, phone_number = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("sssi", $name, $phone_number, $email, $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
        header("Location: welcome.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
