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
$name = $age = $section = $role = $shift = $joined_date = $salary = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $section = $_POST["section"];
    $role = $_POST["role"];
    $shift = $_POST["shift"];
    $joined_date = $_POST["joined_date"];
    $salary = $_POST["salary"];

    // Validate form data (simple validation)
    if (empty($name) || empty($age) || empty($section) || empty($role) || empty($shift) || empty($joined_date) || empty($salary)) {
        $error_message = "All fields are required.";
    } else {
        // SQL query to insert employee data
        $sql = "INSERT INTO employees (name, age, section, role, shift, joined_date, salary) VALUES ('$name', '$age', '$section', '$role', '$shift', '$joined_date', '$salary')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to avoid form resubmission
            header("Location: add_employee.php?added=true");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Add Employee</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .custom-form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            background-color: #f9f9f9;
        }

        .custom-form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            margin: 20px;
        }

        .custom-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .custom-form input[type="text"],
        .custom-form input[type="number"],
        .custom-form input[type="date"] {
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
            <h1>Add Employee</h1>
        </div>
    </div>
    <!-- ================================================ Middle Part ================================================ -->

    <div>
         <h1 style="text-align: center; margin: 10px auto; padding : 5px;">Add a new employee to the organization</h1>
    </div>

    <!-- ================================================ Add Employee Form ================================================ -->
    <div class="custom-form-container">
        <form class="custom-form" method="POST" action="add_employee.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="section">Section:</label>
            <input type="text" id="section" name="section" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>

            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required>

            <label for="shift">Shift:</label>
            <input type="text" id="shift" name="shift" required>

            <label for="joined_date">Joined Date:</label>
            <input type="date" id="joined_date" name="joined_date" required>
            <br>
            <input class="submit-btn" type="submit" value="Add Employee">
        </form>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
    </div>
    <!-- ================================================ Add Employee Form ================================================ -->
    
    <br>
    <hr>
    
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
    <div id="popup" class="alert-popup">
        Employee information has been added.
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.search.includes('added=true')) {
                var popup = document.getElementById('popup');
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                    // Clear the query parameter after displaying the popup
                    var url = new URL(window.location);
                    url.searchParams.delete('added');
                    window.history.replaceState({}, document.title, url);
                }, 3000);
            }
        });
    </script>
</body>
</html>
