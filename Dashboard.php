<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
</head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="navbar.css">
<body>
    
<header class="wrapper bimage" id="header">

    <h1 id="logoName" class="logo">Employee Management System</h1>
    <div class="login_btn" >
        <a class="cta" href="http://localhost/web_engeenering_lab_project/login.php"><button class="btn_sign btn_2">Log Out</button></a>
    </div>
</header>




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

<! ========================================== banner and slide show ========================================= -->
<div class="slider-container">
    <div class="text-block">
        <p >Employee</p>
        <p >Management</p>
        <p >System</p>
    </div>
    <div class="gap"></div>
    <div class="slider-frame">
        <div class="slide-images">
            <div class="img-container">
                <img src="images/1.jpg">
            </div>
            <div class="img-container">
                <img src="images/2.png">
            </div>
            <div class="img-container">
                <img src="images/3.jpg">
            </div>
        </div>
    </div>
</div>
<! ========================================== banner and slide show ========================================= -->
<div>
    <h1 class="middle_heading">
        What is employee management system?
    </h1>
</div>
<div>
    <p id="p1_2nd_para">An employee management system is a platform where all work-related as well as important personal details of an employee is stored and managed in a secure way. By using this system, you can manage admin activities in an easier and quicker way.
Employees are the pillar of any organization and an ideal employee management tool makes a big difference to an organization.
    </p>
</div>

<! ========================================== inline image and text ========================================= -->

<div class="image-block">
    <div class="image-container1">
        <img src="images/1.jpg" alt="Image 1">
        <p>Payroll systems manage everything having to do with the process of paying employees and filing employment taxes. They are put in place to keep track of worked hours, calculating wages, withholding taxes and other deductions, printing and delivering checks, and paying government employment taxes.</p>
        <a href="https://www.freshbooks.com/hub/accounting/how-payroll-systems-work#:~:text=Payroll%20systems%20manage%20everything%20having,and%20paying%20government%20employment%20taxes.">Learn More</a>
    </div>
    <div class="image-container2">
        <img src="images/2.png" alt="Image 2">
        <p>Adaptive HRIS, a world-class human capital management enterprise system with integrated benefits, compensation, performance, employee wellbeing and self-service human resource, enables our customers to manage their resources towards more agile and high-performing organizations efficiently.</p>
        <a href="https://www.adaptivehris.com/">Learn More</a>
    </div>
</div>


<! ========================================== inline image and text ========================================= -->
<! ========================================== Home page footer ========================================= -->
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
<! ========================================== Home page footer ========================================= -->

<! ========================================== JavaScript ========================================= -->

<script>

        let toggle = document.getElementsByClassName('toggle_bar');

        function toggle_bar() {

         let element = document.querySelector(".toggle");
         element.classList.toggle("show")
         
         let element2 = document.querySelector(".bar")
         element2.classList.toggle("bar2")
 
        }

</script>


<!-- ============================================================================================= -->

</body>
</html>