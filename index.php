<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_acc";

// Establishing the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count the number of enrolled students
$sqlEnrolledStudents = "SELECT COUNT(*) as enrolledCount FROM students";
$resultEnrolledStudents = $conn->query($sqlEnrolledStudents);

$enrolledCount = 0; // Initialize enrolled count variable

if ($resultEnrolledStudents && $resultEnrolledStudents->num_rows > 0) {
    $rowEnrolledStudents = $resultEnrolledStudents->fetch_assoc();
    $enrolledCount = $rowEnrolledStudents['enrolledCount'];
}


// Query to calculate total amount collected
$sqlTotalAmount = "SELECT SUM(amountPaid) as totalAmount FROM fees_info";
$resultTotalAmount = $conn->query($sqlTotalAmount);

$totalAmount = 0; // Initialize total amount variable

if ($resultTotalAmount && $resultTotalAmount->num_rows > 0) {
    $rowTotalAmount = $resultTotalAmount->fetch_assoc();
    $totalAmount = $rowTotalAmount['totalAmount'];
}
$sqlRecentStudents = "SELECT sa.studentNo, sa.name, sa.course FROM student_acc sa ORDER BY sa.course DESC LIMIT 5";
$resultRecentStudents = $conn->query($sqlRecentStudents);

$studentActivities = []; // Initialize an array to store student activities

if ($resultRecentStudents && $resultRecentStudents->num_rows > 0) {
    while ($row = $resultRecentStudents->fetch_assoc()) {
        $studentActivities[] = $row['name'] . " with student No. " . $row['studentNo'] . " joined";
    }
}

// Query to get recent payment activities with names
$sqlRecentPayments = "SELECT fi.studentNo, sa.name, fi.datePaid FROM fees_info fi 
                      LEFT JOIN student_acc sa ON fi.studentNo = sa.studentNo 
                      ORDER BY fi.datePaid DESC LIMIT 5";
$resultRecentPayments = $conn->query($sqlRecentPayments);

$paymentActivities = []; // Initialize an array to store payment activities

if ($resultRecentPayments && $resultRecentPayments->num_rows > 0) {
    while ($row = $resultRecentPayments->fetch_assoc()) {
        $paymentActivities[] = "You added payment to " . $row['name'] . " with student No. " . $row['studentNo'];
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo.png" alt="cspc logo">
            </div>

            <span class="logo_name">OlClearance</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="feeManagement.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Fee Management</span>
                </a></li>
                <li><a href="fees_table.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">View Fees</span>
                </a></li>

                <li><a href="student_management_section.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Students</span>
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
            <img src="profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Admin Dashboard</span>
                </div>

                <div class="boxes">
    <div class="box box1">
        <i class="uil uil-users-alt"></i>
        <span class="text">No. Of Enrolled Student(s)</span>
        <span class="number"><?php echo $enrolledCount; ?></span>
    </div>
                    <div class="box box2">
    <i class="uil uil-user"></i>
    <span class="text">No. User(s)</span>
    <span class="number"><?php echo $enrolledCount; ?></span>
</div>
<div class="box box3">
                        <i class="uil uil-money-bill"></i>
                        <span class="text">Total Amount</span>
                        <span class="number"><?php echo number_format($totalAmount, 2); ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
        <div class="title">
            <i class="uil uil-clock-three"></i>
            <span class="text">Recent Activity</span>
        </div>

        <div class="activity-data">
            <div class="data names">
                <span class="data-title">Notifications</span>
                <?php foreach ($studentActivities as $activity) : ?>
                    <span class="data-list"><?php echo $activity; ?></span>
                <?php endforeach; ?>
                <?php foreach ($paymentActivities as $activity) : ?>
                    <span class="data-list"><?php echo $activity; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </section>
</body>
</html>