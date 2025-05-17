<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account- Student</title>
    <style>
          body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            height: 100%;
            background: url('bg2.jpg') no-repeat center center fixed;
            background-size: cover;
            
            justify-content: center;
            align-items: center;
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
        form {
            background-color: rgba(249, 249, 249, 0.8);
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.2);
            max-width: 350px;
            width: 100%;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="password"],
        .form-group select {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 0.3rem;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            height: 55px;
            outline: none;
            font-size: 15px;

        }

        .form-group select {
            width: 97%;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #1d3557;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #457b9d;
        }
        .form-group h2{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="background-logo">
        <img src="logo.png" alt="Logo" width="50">
        OlClearance
    </div>
    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_acc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $studentNo = $_POST['studentNo'];
    $course = $_POST['course'];
    $section = $_POST['section'];
    $inputPassword = $_POST['password'];

 
    $checkQuery = "SELECT studentNo FROM student_acc WHERE studentNo = '$studentNo'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Student number already exists. Please use a different Student No.";
    } else {
    
        $sql = "INSERT INTO student_acc (name, studentNo, course, section, password) VALUES ('$name', '$studentNo', '$course', '$section', '$inputPassword')";

        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
        <h2>Signup</h2>
            <input type="text" id="name" name="name" required placeholder="Enter your name Ex. Cezar, Michaela M.">
        <div class="form-group">
            <br>
            <input type="text" id="studentNo" name="studentNo" required placeholder="Enter your student no.">
        </div>
        <div class="form-group">
            <select id="course" name="course" required placeholder="Select Course">
    <option value="Computer Science">Computer Science</option>
    <option value="Information System">Information System</option>
    <option value="Information Technology">Information Technology</option>
    <option value="Library and Information Science">Library and Information Science</option>
</select>
        </div>
        <div class="form-group">
            <input type="text" id="section" name="section" required placeholder="Enter your section Ex. 2A">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" required placeholder="Create a password">
        </div>
        <div class="form-group">
            <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
        </div>
        <div class="form-group">
            <button type="submit">Create Account</button>
        </div>
        <?php if (!empty($error_message)) : ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </form>
</body>
</html>
<script>
 
  document.getElementById('confirm_password').addEventListener('input', function () {
    const password = document.getElementById('password').value;
    const confirm_password = document.getElementById('confirm_password').value;
    
    if (password !== confirm_password) {
      document.getElementById('confirm_password').setCustomValidity('Passwords do not match');
    } else {
      document.getElementById('confirm_password').setCustomValidity('');
    }
  });
</script>
</body>
</html>
