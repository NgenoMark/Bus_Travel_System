<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Button</title>
</head>
<body>
    <form id="logoutForm" action="/logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>

    <script>
        document.getElementById('logoutForm').addEventListener('submit', function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Perform any cleanup or additional actions if needed

            // Redirect to the desired page
            window.location.href = 'Home page.html'; // Adjust the path as needed
        });
    </script>
</body>
</html>
