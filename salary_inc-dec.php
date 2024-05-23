<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Since the password is empty for the 'root' user in your MySQL configuration
$dbname = "web_engineering_lab_project"; // Corrected database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store form data and error messages
$id = $name = $action = $amount = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $action = $_POST["action"];
    $amount = $_POST["amount"];

    // Validate form data (simple validation)
    if (empty($id) || empty($name) || empty($action) || empty($amount)) {
        $error_message = "All fields are required.";
    } elseif (!is_numeric($amount) || $amount <= 0) {
        $error_message = "Amount must be a positive number.";
    } else {
        // Determine SQL query based on action (increment or decrement)
        if ($action == "increment") {
            $sql = "UPDATE employees SET salary = salary + $amount WHERE id = '$id' AND name = '$name'";
        } elseif ($action == "decrement") {
            $sql = "UPDATE employees SET salary = salary - $amount WHERE id = '$id' AND name = '$name'";
        }

        if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
            // Redirect to avoid form resubmission
            header("Location: salary_inc-dec.php?updated=$action");
            exit();
        } else {
            // Redirect with error parameter
            header("Location: salary_inc-dec.php?error=true");
            exit();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increment/Decrement Salary</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .custom-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            background-color: #f9f9f9;
            padding-top: 1%;
            padding-bottom: 2.5%;
            padding-left: 2.5%;
            padding-right: 2.5%;
        }

        .custom-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: 10px;
        }

        .custom-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .custom-form input[type="text"],
        .custom-form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .custom-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .custom-form .submit-btn {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-align: center;
            margin-top: 20px;
        }

        .custom-form .submit-btn:hover {
            background-color: #333434;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .alert-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            text-align: center;
        }

        .header-container {
            text-align: center;
            padding: 2.5%;
        }

        .para-container {
            text-align: center;
            padding: auto;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- ================================================ navigation bar ================================================ -->
    <nav class="navbar">
        <div class="navbar-left">
            <ul class="navbar-list">
                <li class="navbar-item"><a href="Dashboard.html">DashBoard</a></li>
                <li class="navbar-item with-dropdown">
                    <a href="#">Manage Employee</a>
                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/web_engeenering_lab_project/employee_list.php">Employee List</a></li>
                        <li><a href="http://localhost/web_engeenering_lab_project/add_employee.php">Add Employee</a></li>
                        <li><a href="http://localhost/web_engeenering_lab_project/remove_employee.php">Remove Employee</a></li>
                    </ul>
                </li>
                <li class="navbar-item with-dropdown">
                    <a href="#">Salary Info.</a>
                    <ul class="dropdown-menu">
                       <li><a href="http://localhost/web_engeenering_lab_project/salary_inc-dec.php" >Salary +/-</a></li>
                       <li><a href="http://localhost/web_engeenering_lab_project/pay_salary.php" >Pay Salary</a></li>
                       <li><a href="http://localhost/web_engeenering_lab_project/salary_details.php" >Salary Details</a></li>
                    </ul>
                </li>
                <li class="navbar-item"><a href="about.html">About</a></li>
            </ul>
        </div>
        <div class="navbar-right">
            <span class="logo">
                <a class="navbar-item-log-out" href="http://localhost/web_engeenering_lab_project/login.php">Log out</a>
                <img src="https://p.kindpng.com/picc/s/77-770765_payroll-png-payroll-management-system-icon-transparent-png.png" alt="Logo">
                <span class="website-name">Employee Management System</span>
            </span>
        </div>
    </nav>
    <!-- ================================================ navigation bar ================================================ -->
    
    <!-- ================================================ Middle Part ================================================ -->
    <div class="hero-section">
        <img src="images/handshake.png" alt="Background Image" class="background-image">
        <div class="overlay">
            <h1>Increment/Decrement Salary</h1>
        </div>
    </div>
    <!-- ================================================ Middle Part ================================================ -->

    <div class="header-container">
        <h1>Update an employee's salary</h1>
    </div>
    <div class="para-container">
        <p>Enter the ID and name of the employee whose salary you want to update. Select the action and enter the amount.</p>
    </div>

    <!-- ================================================ Update Salary Form ================================================ -->
    <div class="custom-form-container">
        <form class="custom-form" method="POST" action="salary_inc-dec.php">
            <label for="id">Employee ID:</label>
            <input type="number" id="id" name="id" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="action">Action:</label>
            <select id="action" name="action" required>
                <option value="increment">Increment</option>
                <option value="decrement">Decrement</option>
            </select>

            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
            
            <input class="submit-btn" type="submit" value="Update Salary">
        </form>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
    </div>
    <!-- ================================================ Update Salary Form ================================================ -->
    
    <!-- ========================================== Home page footer ========================================= -->
    <footer class="footer">
    <div class="social-media-icons">
        <a href="https://www.facebook.com/Razone.Parvej.Rabbi/" target="_blank">
            <img src="images/facebook.png" alt="Facebook">
        </a>
        <a href="https://x.com/R_P_Rabbi10" target="_blank">
            <img src="images/tweeter-x.png" alt="Twitter">
        </a>
        <a href="https://github.com/RpRabbi" target="_blank">
            <img src="images/github.jpg" alt="Github">
        </a>
        <a href="https://www.linkedin.com/in/rprabbi10/" target="_blank">
            <img src="images/linkedin.png" alt="LinkedIn">
        </a>
    </div>
    <div class="social-media-icons">
        <a href="https://www.facebook.com/younusbhuiyan.abir.7" target="_blank">
            <img src="images/facebook.png" alt="Facebook">
        </a>
        <a href="https://x.com/YounusBhuiyan11" target="_blank">
            <img src="images/tweeter-x.png" alt="Twitter">
        </a>
        <a href="https://github.com/RpRabbi" target="_blank">
            <img src="images/github.jpg" alt="Github">
        </a>
        <a href="https://www.linkedin.com/in/younus-bhuiyan-8189302a9/" target="_blank">
            <img src="images/linkedin.png" alt="LinkedIn">
        </a>
    </div>
        <div class="footer-text">
            &copy; 2024 Team Akatsuki. All rights reserved.
        </div>
    </footer>
    <!-- ========================================== Home page footer ========================================= -->

    <!-- Popup message -->
    <div id="popup-increment" class="alert-popup">
        Salary has been increased.
    </div>

    <div id="popup-decrement" class="alert-popup">
        Salary has been decreased.
    </div>

    <div id="error-popup" class="alert-popup">
        Error updating salary. Please check the ID and Name.
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('updated')) {
                var action = urlParams.get('updated');
                var popup = document.getElementById('popup-' + action);
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                    var url = new URL(window.location);
                    url.searchParams.delete('updated');
                    window.history.replaceState({}, document.title, url);
                }, 3000);
            }

            if (urlParams.has('error')) {
                var errorPopup = document.getElementById('error-popup');
                errorPopup.style.display = 'block';
                setTimeout(function() {
                    errorPopup.style.display = 'none';
                    var url = new URL(window.location);
                    url.searchParams.delete('error');
                    window.history.replaceState({}, document.title, url);
                }, 3000);
            }
        });
    </script>
</body>
</html>
