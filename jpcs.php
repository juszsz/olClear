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
                    <span class="text">View JPCS Fee</span>
                </div>
                
                <div class="container">
                <?php
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

    if (isset($_POST['submit'])) {
        $feeType = $_POST['feeType'];

        // Fetch and display enrolled students for selected fee type
        $sql = "SELECT s.studentName, s.section, s.studentNo, f.feeType, f.feeAmount, f.amountPaid, f.dueDate, f.datePaid, IFNULL(f.status, 'Not Paid') AS status 
                FROM students s
                LEFT JOIN fees_info f ON s.studentNo = f.studentNo
                WHERE f.feeType = '$feeType'";
        $result = $conn->query($sql);
    }
    ?>

    <form method="POST" action="">
        <label for="feeType">Select Fee Type:</label>
        <select id="feeType" name="feeType">
            <option value="JPCS">JPCS Fee</option>
            <option value="TUITION">Tuition Fee</option>
            <!-- Add other fee options as needed -->
        </select>
        <input type="submit" name="submit" value="View Students">
    </form>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Section</th>
                    <th>Student No</th>
                    <th>Fee Type</th>
                    <th>Fee Amount</th>
                    <th>Amount Paid</th>
                    <th>Due Date</th>
                    <th>Date Paid</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["studentName"] . "</td>";
                        echo "<td>" . $row["section"] . "</td>";
                        echo "<td>" . $row["studentNo"] . "</td>";
                        echo "<td>" . $row["feeType"] . "</td>";
                        echo "<td>" . $row["feeAmount"] . "</td>";
                        echo "<td>" . $row["amountPaid"] . "</td>";
                        echo "<td>" . $row["dueDate"] . "</td>";
                        echo "<td>" . $row["datePaid"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>