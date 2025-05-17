<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_acc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentNo = isset($_SESSION['studentNo']) ? $_SESSION['studentNo'] : '';

$sql = "SELECT
            COUNT(CASE WHEN status = 'Paid' THEN 1 END) AS paidCount,
            COUNT(CASE WHEN status = 'Unpaid' THEN 1 END) AS unpaidCount
        FROM fees_info
        WHERE studentNo = '" . mysqli_real_escape_string($conn, $studentNo) . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $feesPaid = $row['paidCount'] ?? 0;
    $feesUnpaid = $row['unpaidCount'] ?? 0;
} else {
    die("Error fetching data: " . $conn->error);
}

$conn->close();
?>


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
    <title>Student Dashboard</title>
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
                <li><a href="student_dashboard.php">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="Account.php">
                <i class="uil uil-user"></i>
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
            <img src="unknown.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Student Dashboard</span>
                </div>
                <?php
            if (isset($_SESSION['userDetails']['name'])) {
                $studentName = $_SESSION['userDetails']['name'];
                echo '<span class="welcome-message">Welcome, ' . $studentName . '</span>';
            }
            ?>

<div class="boxes">
    <div class="box box1">
        <i class="uil uil-bill"></i>
        <span class="text">Fees Paid</span>
        <h4><?php echo $feesPaid; ?></h4>
    </div>
    <div class="box box2">
        <i class="uil uil-money-bill"></i>
        <span class="text">Fees Unpaid</span>
        <h4><?php echo $feesUnpaid; ?></h4>
    </div>
    <div class="box box3">
        <span class="text">Status</span>
        <?php
        if ($feesUnpaid > 0) {
             echo '<i class="uil uil-exclamation-circle"></i>';
             echo '<h5>Unpaid</h5>';
          } else {
            echo '<i class="uil uil-check-circle"></i>';
            echo '<h5>Cleared</h5>';
         }
        ?>
    </div>
</div>
            </div>
        </div>
    </section>
</body>
</html>