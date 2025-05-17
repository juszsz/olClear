<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['userDetails'])) {
    header('Location: login.php');
    exit();
}

$userDetails = $_SESSION['userDetails']; // Retrieve user details from session

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student_Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body>

<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            margin-top: 20px;
            text-align: center;
        }

        .profile-img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
            border: 5px solid #fff; /* Added border around the image */
        }

        .profile-info {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Added box shadow for depth */
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-info p {
            margin-bottom: 10px;
        }
    </style>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo.png" alt="cspc logo">
            </div>

            <span class="logo_name">OlClearance</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="student_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="Account.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Account</span>
                </a></li>
                <li><a href="student_viewfees.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">View Fees</span>
                </a></li>
            </ul>
            
            <ul class="logout-mode">
                <li><a href="login.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
    </nav>

   <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="stud_prof.jpg" alt="">
        </div>
        <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Account</span>
            </div>
            <div class="container">
                <div class="profile-info">
                    <img src="stud_prof.jpg" alt="Student Profile Picture" class="profile-img">
                    <h2>User Profile</h2>
                    <p><strong>Name:</strong> <?php echo $userDetails['name']; ?></p>
                    <p><strong>Student No:</strong> <?php echo $userDetails['studentNo']; ?></p>
                    <p><strong>Course:</strong> <?php echo $userDetails['course']; ?></p>
                    <p><strong>Section:</strong> <?php echo $userDetails['section']; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>