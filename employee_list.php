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
    <link rel="stylesheet" href="navbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- ================================================ navigation bar ================================================ -->

<div class="main_dropdown_container">
   
  
   <div class="dropdown_logo_bar_li" onclick="toggle_bar()" id="toggle_bar" ><i class="fas fa-bars dropdown_logo_bar bar " ></i></div>

   <nav class="navbar_container toggle">
           <div class="main_navbar">
              
               <ul class="main_navbar_ul">
               
                   <li class="navbar_level_1_li"><a href="" class="navbar_level_1_link">Dashboard</a></li>
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
            <h1>Employee List</h1>
        </div>
    </div>
    <!-- ================================================ Middle Part ================================================ -->

    <div>
         <h1 style="text-align: center; margin: 10px auto; padding : 5px;">All employees information of the organization</h1>
    </div>
    <div>
        <p class="styled-paragraph">Managing all employee information within an organization is essential for effective human resource management. This comprehensive data includes personal details like names, contact information, and emergency contacts, as well as employment specifics such as job titles, departments, and employment status. It also encompasses compensation and benefits information, including salary, bonuses, and benefits like health insurance. Performance and development records, including reviews and training, are critical for career progression, while attendance and leave data ensure accurate tracking of time off and entitlements. Additionally, legal and compliance records, skills and qualifications, and health and safety information are crucial for adhering to regulations and maintaining a safe workplace. Proper management of this information supports efficient HR processes, compliance, informed decision-making, and enhances employee engagement and security, ultimately contributing to the organization’s overall productivity and success.</p>
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
    
<div>
    <p class="styled-paragraph_1">All the employee's information have been generated here.</p>
</div>

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
