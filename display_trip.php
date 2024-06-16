<!DOCTYPE html>
<html>
<head>
    <title>Trip Details</title>
    <style>
        .container {
            width: 50%;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .container h2 {
            text-align: center;
        }
        .container p {
            font-size: 18px;
            line-height: 1.5;
        }
        .container button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #ac4f4f;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }
        .container button:hover {
            background-color: #6311af;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2><?php echo ucfirst($_GET['type']); ?> Details</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($_GET['location']); ?></p>
        <p><strong>Price:</strong> <?php echo htmlspecialchars($_GET['price']); ?></p>
        <p><strong>Date:</strong> <?php echo htmlspecialchars($_GET['date']); ?></p>
        <p><strong>Time:</strong> <?php echo htmlspecialchars($_GET['time']); ?></p>
        <p><strong>Means of Payment:</strong> <?php echo htmlspecialchars($_GET['payment']); ?></p>
        <p><strong>Stage of Pickup:</strong> <?php echo htmlspecialchars($_GET['pickup']); ?></p>
        <button onclick="location.href='welcome.html'">Home</button>
    </div>

</body>
</html>
