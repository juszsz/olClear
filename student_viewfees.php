<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['userDetails'])) {
    header('Location: login.php');
    exit();
}

$userDetails = $_SESSION['userDetails']; // Retrieve user details from session

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_acc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentNo = $userDetails['studentNo'];

$sql = "SELECT * FROM fees_info WHERE studentNo = '$studentNo'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Viewing Fees</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    
    <style>
.container {
    margin-top: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ccc;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}

td {
    background-color: #fff;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f0f0f0;
}

.table-options {
    margin-top: 10px;
}

.table-options button {
    padding: 8px 16px;
    margin: 0 5px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.table-options button.modify {
    background-color: #007bff; 
    color: #fff;
}

.table-options button.delete {
    background-color: #dc3545; 
    color: #fff;
}

.table-options button.insert {
    background-color: #28a745; 
    color: #fff;
}

.table-options button:hover {
    filter: brightness(85%);
}
.student-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text
        }
        .student-info span {
            white-space: nowrap; 
            margin-right: 20px; 
            font-weight: bold;
        }
</style>
<nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="logo.png" alt="">
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
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">View Fees</span>
                </div>
                <section class="student-info">
        <div class="container">
            <span><?php echo $userDetails['name']; ?></span>
            <span><?php echo $userDetails['studentNo']; ?></span>
            <span><?php echo $userDetails['section']; ?></span>
        </div>
    </section>
                <div class="container">
                    <table>
                       
                        <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                echo "<table border='1'>";
                                echo "<tr><th>Fee Type</th><th>Fee Amount</th><th>Amount Paid</th><th>Due Date</th><th>Date Paid</th><th>Status</th></tr>";

                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["feeType"] . "</td>";
                                    echo "<td>" . $row["feeAmount"] . "</td>";
                                    echo "<td>" . $row["amountPaid"] . "</td>";
                                    echo "<td>" . $row["dueDate"] . "</td>";
                                    echo "<td>" . $row["datePaid"] . "</td>";
                                    echo "<td>" . $row["status"] . "</td>";
                                    echo "</tr>";
                                }

                                echo "</table>";
                            } else {
                                echo "No fees data available for this student";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
