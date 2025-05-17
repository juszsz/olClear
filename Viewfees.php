<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Panel</title>
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
                <li><a href="Account.php">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Account</span>
                </a></li>
                <li><a href="feeManagement.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Fee Management</span>
                </a></li>
                <li><a href="Viewfees.php">
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
            
            <img src="profile.jpg" alt="">
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">View Fees</span>
                </div>

                <div class='container'>
                    <table>
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Section</th>
                                <th>Student No</th>
                                <th>Fee Type</th>
                                <th>Fee Amount</th>
                                <th>Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fees = [];

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Retrieve form data
                                $studentName = $_POST["studentName"];
                                $section = $_POST["section"];
                                $studentNo = $_POST["studentNo"];
                                $feeType = $_POST["feeType"];
                                $feeAmount = $_POST["feeAmount"];
                                $amountPaid = $_POST["amountPaid"];

                                $entry = [
                                    'studentName' => $studentName,
                                    'section' => $section,
                                    'studentNo' => $studentNo,
                                    'feeType' => $feeType,
                                    'feeAmount' => $feeAmount,
                                    'amountPaid' => $amountPaid
                                ];
                                $fees[] = $entry;
                            }

                            foreach ($fees as $entry) {
                                echo "<tr>";
                                echo "<td>{$entry['studentName']}</td>";
                                echo "<td>{$entry['section']}</td>";
                                echo "<td>{$entry['studentNo']}</td>";
                                echo "<td>{$entry['feeType']}</td>";
                                echo "<td>{$entry['feeAmount']}</td>";
                                echo "<td>{$entry['amountPaid']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    
    <div class="table-options">
        <button class="modify">Modify</button>
        <button class="delete">Delete</button>
        <button class="insert">Insert</button>
    </div>
</div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
