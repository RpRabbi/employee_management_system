<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="site-title">Employee Management System</h1>
        <h1 class="title-small">Make it easier.</h1>
        <div class="form-container">
            <form id="signInForm" method="POST" action="login.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <div id="alertPopup" class="alert-popup"></div>

    <script src="scripts.js"></script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'web_engineering_lab_project');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: Dashboard.html");
        exit();
    } else {
        echo "<script>
                var alertPopup = document.getElementById('alertPopup');
                alertPopup.textContent = 'Wrong username or password';
                alertPopup.style.display = 'block';
                setTimeout(function() {
                    alertPopup.style.display = 'none';
                }, 3000);
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
