<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Viewing Fees (JPCS FEE)</title>
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
                    <span class="text">View Fees (JPCS)</span>
                </div>
                <form method="POST" action="">
                <label for="feeType">Select Fee Type:</label>
<select id="feeType" name="feeType" onchange="redirectToFeePage()">
    <option value="JPCS_FEE">JPCS Fee</option>
    <option value="BYCIT_FEE">BYCIT Fee</option>
    <option value="TUITION_FEE">Tuition Fee</option>
    <option value="TEAM_BUILDING">Team Building Fee</option>
    <option value="PROM_FEE">Prom Fee</option>
</select>

<script>
    function redirectToFeePage() {
        var selectedFeeType = document.getElementById("feeType").value;
        switch (selectedFeeType) {
            case 'BYCIT_FEE':
                window.location.href = 'bycitFee.php';
                break;
            case 'JPCS_FEE':
                window.location.href = 'jpcs_fee.php';
                break;
            case 'TUITION_FEE':
                window.location.href = 'tuition_fee.php';
                break;
            case 'TEAM_BUILDING':
                window.location.href = 'teamBuildingFee.php';
                break;
            case 'PROM_FEE':
                window.location.href = 'promFee.php';
                break;
            default:
                // Redirect to a default page or handle other cases if needed
                break;
        }
    }
</script>

                    
                </form>
<?php
// Database connection
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

// Fetch payments related to BYCIT FEE
$sql = "SELECT DISTINCT studentNo, studentName, section, feeType, amountPaid, dueDate, datePaid, status FROM fees_info WHERE feeType = 'JPCS_FEE'  ORDER BY studentName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display table header
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Student No</th>
                <th>Section</th>
                <th>Fee Type</th>
                <th>Amount Paid</th>
                <th>Due Date</th>
                <th>Date Paid</th>
                <th>Status</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["studentName"] . "</td>
                <td>" . $row["studentNo"] . "</td>
                <td>" . $row["section"] . "</td>
                <td>" . $row["feeType"] . "</td>
                <td>" . $row["amountPaid"] . "</td>
                <td>" . $row["dueDate"] . "</td>
                <td>" . $row["datePaid"] . "</td>
                <td>" . $row["status"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</section>
</body>
</html>
