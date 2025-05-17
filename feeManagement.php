<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_acc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = mysqli_real_escape_string($conn, $_POST["studentName"]);
    $section = mysqli_real_escape_string($conn, $_POST["section"]);
    $studentNo = mysqli_real_escape_string($conn, $_POST["studentNo"]);
    $feeType = mysqli_real_escape_string($conn, $_POST["feeType"]);
    $feeAmount = $_POST["feeAmount"];
    $amountPaid = $_POST["amountPaid"];
    $dueDate = $_POST["dueDate"];
    date_default_timezone_set('Asia/Manila');
    $datePaid = date('Y-m-d');

    if ($amountPaid == $feeAmount) {
        $status = "Paid";
    } elseif ($amountPaid > 0) {
        $status = "Partial Payment";
    } else {
        $status = "Not Paid";
    }

    $checkEnrollmentQuery = "SELECT * FROM students WHERE studentName = '$studentName' AND studentNo = '$studentNo'";
    $enrollmentResult = $conn->query($checkEnrollmentQuery);

    if ($enrollmentResult->num_rows > 0) {
        // Student is enrolled, proceed to add fees
        $sql = "INSERT INTO fees_info (studentName, section, studentNo, feeType, feeAmount, amountPaid, dueDate, datePaid, status)
                VALUES ('$studentName', '$section', '$studentNo', '$feeType', '$feeAmount', '$amountPaid', '$dueDate', '$datePaid', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Fee payment recorded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Student is not enrolled, display the error message
        echo "<span style='color: red;'>Student is not enrolled or not in the list.</span>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin- Fee Management</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script>
   function getFeeDetails(feeType) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            document.getElementById("dueDate").value = response.dueDate;
            document.getElementById("feeAmount").value = response.feeAmount;
        }
    };
    xhttp.open("GET", "get_fee_details.php?feeType=" + feeType, true);
    xhttp.send();

    }
    </script>
</head>
<body>
    <style>
        

form label {
    margin-bottom: 5px;
}
form input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
form input[type="submit"] {
    background-color: #1d3557;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 10%;
    display: inline-block; 
    float: left; 

}

form input[type="submit"]:hover {
    background-color: #457b9d;
}
.error-message {
    color: red;
    font-size: 14px;
}
.container {
    margin-top: 20px;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    border: 0.5px solid #ccc;
    padding: 12px; 
    text-align: center; 
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
}


tr:nth-child(even) {
    background-color: #f9f9f9;
}
tr:hover {
    background-color: #ddd;
}


td.studentName,
td.section,
td.studentNo,
td.feeType,
td.feeAmount,
td.amountPaid {
    color: #555;
    font-weight: bold;
}
td.status {
            font-weight: bold;
        }

        td.status.paid {
            color: green;
        }

        td.status.partial {
            color: orange;
        }

        td.status.unpaid {
            color: red;
        }
        select#feeType {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
select#feeType option {
    background-color: #fff; 
    color: #000; 
}


select#feeType option:hover {
    background-color: #f2f2f2; 
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
        </ul>
        <ul class="logout-mode">
        <li><a href="login.php">
        <i class="uil uil-signout"></i>
        <span class="link-name">Logout</span>
        </a></li>
        </ul>
        </div>
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
        <span class="text">Fee Management</span>
        </div>

        <form action="feeManagement.php" method="POST">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required placeholder="Ex. Cezar, Michaela M."><br>

        <label for="section">Section:</label>
        <input type="text" id="section" name="section"  required placeholder="Ex. BSIT-2A"><br>

        <label for="studentNo">Student No:</label>
        <input type="text" id="studentNo" name="studentNo" required><br>

                    
        <label for="feeType">Fee Type:</label>
        <select id="feeType" name="feeType" required onchange="getFeeDetails(this.value)">
           <option value="BYCIT_FEE">BYCIT FEE</option>
           <option value="JPCS_FEE">JPCS FEE</option>
           <option value="TUITION_FEE">TUITION FEE</option>
           <option value="TEAM_BUILDING">TEAM BUILDING FEE</option>
           <option value="PROM_FEE">PROM FEE</option>
        </select><br>

        <label for="dueDate">Due Date:</label>
        <input type="text" id="dueDate" name="dueDate" readonly><br>

        <label for="feeAmount">Fee Amount:</label>
        <input type="text" id="feeAmount" name="feeAmount" readonly><br>


        <label for="amountPaid">Amount Paid:</label>
        <input type="number" id="amountPaid" name="amountPaid"><br>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $enrollmentResult->num_rows <= 0): ?>
        <span style="color: red;">Student is not enrolled or not in the list.</span><br>
    <?php endif; ?>


        <input type="submit" value="Pay">
        </form>
            
        
            </div>
        </div>
    </section>
</body>
</html>
