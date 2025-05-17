<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Section</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        /* Provided CSS style */
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

        input[type="text"],
        input[type="submit"] {
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 13px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
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
    </nav>
    <section class="dashboard">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Enrolled Students</span>
                </div>
                <div class="container">
                  
                    <form method="post">
                        <label for="studentName">Student Name:</label>
                        <input type="text" id="studentName" name="studentName" required>
                        
                        <label for="studentNo">Student No.:</label>
                        <input type="text" id="studentNo" name="studentNo" required>
                        
                        <label for="section">Section:</label>
                        <input type="text" id="section" name="section" required>
                        
                        <input type="submit" name="submit" value="Enroll Student">
                    </form>

                    <div class="container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th>Student No.</th>
                                    <th>Section</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Display enrolled students
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "create_acc";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM `students` WHERE 1";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["studentName"] . "</td>";
                                        echo "<td>" . $row["studentNo"] . "</td>";
                                        echo "<td>" . $row["section"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No students found.</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
