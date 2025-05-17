<?php
session_start();

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "create_acc";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $studentNo = $_POST['studentno'];
    $inputPassword = $_POST['passWord'];

    $sql = "SELECT * FROM student_acc WHERE studentNo = '$studentNo' AND password = '$inputPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Fetch user details
        $userDetails = $result->fetch_assoc();

        $_SESSION['userDetails'] = $userDetails; // Store user details in a session variable
        header('Location: student_dashboard.php');
        // echo "Logged in Successful";
        exit();
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('bg2.jpg') no-repeat center center fixed;
            font-size: 15px;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .background-logo {
            position: absolute;
            top: 20px; 
            left: 20px; 
            z-index: 1; 
            color: #f4d35e; 
            font-size: 24px; 
            font-weight: bold; 
            display: flex; /* Added */
            align-items: center; /* Added */
        }

        .background-logo img {
            margin-right: 10px; /* Added margin for separation */
        }
        .login-container {
            background-color: rgba(249, 249, 249, 0.8);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.2);
            max-width: 350px;
            width: 100%;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center; /* Added */
            margin-bottom: 30px;
        }

        .logo img {
            margin-right: 10px;
            vertical-align: middle;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group button {
            width: 125px;
            padding: 8px;
            margin: 0 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
            background-color: #1d3557;
            color: white;
        }

        .form-group button:hover {
            background-color: #457b9d;
        }
        .form-group input[type="text"],
        .form-group input[type="password"],
        .form-group select {
            width: calc(70% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .error-message{
            color: red;
            font-size: 14px;
        }
        .create-account {
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
        }

        .create-account p {
            margin-bottom: 5px;
            text-decoration: none;
        }

        .create-account a {
            color: #457b9d;
            text-decoration: none;
            font-size: 15px;
        }

        .create-account a:hover {
            color: #e09f3e;
        }
        a {
            color: blue; /* Blue color */
            text-decoration: none; /* Remove text decoration */
        }
    </style>
</head>
<body>
<div class="background-logo">
        <img src="logo.png" alt="Logo" width="50">
        OlClearance
    </div>
    
    <div class="login-container">
        <div class="logo">
            <img src="CssLogo.png" alt="Logo" width="50">
        </div>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="studentno" placeholder="Student No"><br><br>
                <?php
                if (isset($error_message)) {
                    echo '<p class="error-message">' . $error_message . '</p>';
                }
                ?>
                <input type="password" name="passWord" placeholder="Password"><br><br>
                <button type="submit" name="login">Login</button>
            </div>
            <p>Don't have an account? <a href="create_account.php">Signup</a></p>
            
        </form>
    </div>
</body>
</html>
