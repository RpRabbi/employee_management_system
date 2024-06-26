<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .alert-popup {
            display: none;
            background-color: #f44336;
            color: white;
            padding: 15px 30px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            border-radius: 20px;
            text-align: center;
        }
        #orText {
            text-align: center;
            margin: 10px 0;
        }
        #signUpButton {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #355ddd;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        #signUpButton:hover {
            background-color: #3c3c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="site-title">Employee Management System</h1>
        <h1 class="title-small">keep it simple & easy.</h1>
        <div class="form-container">
            <form id="signInForm" method="POST" action="">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Sign In</button>
                <div id="orText">or</div>
                <a id="signUpButton" href="SignUp.php">Sign Up</a>
            </form>
        </div>
    </div>

    <div id="alertPopup" class="alert-popup"></div>

    <script>
        function showAlert(message) {
            var alertPopup = document.getElementById('alertPopup');
            alertPopup.textContent = message;
            alertPopup.style.display = 'block';
            setTimeout(function() {
                alertPopup.style.display = 'none';
            }, 3000);
        }
    </script>
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
        header("Location: Dashboard.php");
        exit();
    } else {
        echo "<script>showAlert('Wrong username or password');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
