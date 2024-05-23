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

// SQL query to fetch employee data
$sql = "SELECT id, name, age, section, role, shift, joined_date FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            <h1>Employee List</h1>
        </div>
    </div>
    <!-- ================================================ Middle Part ================================================ -->

    <div>
         <h1 style="text-align: center; margin: 10px auto; padding : 5px;">All employees information of the organization</h1>
    </div>


    <!-- ================================================ Employee List ================================================ -->
    <div class="employee-list-container">
        <table class="employee-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Section</th>
                    <th>Role</th>
                    <th>Shift</th>
                    <th>Joined Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["section"] . "</td>";
                        echo "<td>" . $row["role"] . "</td>";
                        echo "<td>" . $row["shift"] . "</td>";
                        echo "<td>" . $row["joined_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No employees found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- ================================================ Employee List ================================================ -->
    
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
</body>
</html>
