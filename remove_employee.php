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
$id = $name = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST["id"];
    $name = $_POST["name"];

    // Validate form data (simple validation)
    if (empty($id) || empty($name)) {
        $error_message = "Both ID and Name are required.";
    } else {
        // SQL query to delete employee data
        $sql = "DELETE FROM employees WHERE id = '$id' AND name = '$name'";

        if ($conn->query($sql) === TRUE && $conn->affected_rows > 0) {
            // Redirect to avoid form resubmission
            header("Location: remove_employee.php?removed=true");
            exit();
        } else {
            // Redirect with error parameter
            header("Location: remove_employee.php?error=true");
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
    <title>Remove Employee</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbar.css">
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

<div class="main_dropdown_container">
   
  
   <div class="dropdown_logo_bar_li" onclick="toggle_bar()" id="toggle_bar" ><i class="fas fa-bars dropdown_logo_bar bar " ></i></div>

   <nav class="navbar_container toggle">
           <div class="main_navbar">
              
               <ul class="main_navbar_ul">
               
                   <li class="navbar_level_1_li"><a href="http://localhost/web_engeenering_lab_project/Dashboard.php" class="navbar_level_1_link">Dashboard</a></li>
                   <li class="navbar_level_1_li ">
                       <a href="" class="navbar_level_1_link">Manage Employee</a>
                   
                           <ul class="dropdown_level_1">

                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/employee_list.php" class="navbar_level_2_link">Employee List</a></li>
                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/add_employee.php" class="navbar_level_2_link">Add Employee</a></li>
                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/remove_employee.php" class="navbar_level_2_link">Remove Employee</a></li>

                           </ul>
                   </li>
                   <li class="navbar_level_1_li ">
                       <a href="" class="navbar_level_1_link">Salary Info.</a>
                   
                           <ul class="dropdown_level_1">

                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/salary_inc-dec.php" class="navbar_level_2_link">Salary +/-</a></li>
                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/pay_salary.php" class="navbar_level_2_link">Pay Salary</a></li>
                                   <li class="navbar_level_2_li"><a href="http://localhost/web_engeenering_lab_project/salary_details.php" class="navbar_level_2_link">Salary Details</a></li>

                           </ul>
                   </li>
                   <li class="navbar_level_1_li"><a href="http://localhost/web_engeenering_lab_project/about.html" class="navbar_level_1_link">About</a></li>
                   <li id="LogoutButton" class="navbar_level_1_li" ><a href="http://localhost/web_engeenering_lab_project/login.php" class="navbar_level_1_link">Log Out</a></li>
               </ul>

           </div>
   </nav>
</div>
<!-- ================================================ navigation bar ================================================ -->
    
    <!-- ================================================ Middle Part ================================================ -->
    <div class="hero-section">
        <img src="images/handshake.png" alt="Background Image" class="background-image">
        <div class="overlay">
            <h1>Remove Employee</h1>
        </div>
    </div>
    <!-- ================================================ Middle Part ================================================ -->

    <div class="header-container">
        <h1>Remove an employee from the organization</h1>
    </div>
    <div class="para-container">
        <p>Enter ID and name of the employee you want to remove. Carefully enter the exact name with capital and small letter used for adding employee information. Otherwise it will not work.</p>
    </div>

    <!-- ================================================ Remove Employee Form ================================================ -->
    <div class="custom-form-container">
        <form class="custom-form" method="POST" action="remove_employee.php">
            <label for="id">Employee ID:</label>
            <input type="number" id="id" name="id" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <input class="submit-btn" type="submit" value="Remove Employee">
        </form>
        <?php
        if (!empty($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
    </div>
    <!-- ================================================ Remove Employee Form ================================================ -->
    
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
    <div class="footer-text">
        &copy; 2024 Team Akatsuki. All rights reserved.
    </div>
    </footer>
    <!-- ========================================== Home page footer ========================================= -->

    <!-- Popup message -->
    <div id="popup" class="alert-popup">
        The employee has been removed.
    </div>

    <div id="error-popup" class="alert-popup">
        Incorrect id or name.
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var urlParams = new URLSearchParams(window.location.search);

            if (urlParams.has('removed')) {
                var popup = document.getElementById('popup');
                popup.style.display = 'block';
                setTimeout(function() {
                    popup.style.display = 'none';
                    var url = new URL(window.location);
                    url.searchParams.delete('removed');
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
