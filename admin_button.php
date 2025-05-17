<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    if (empty($username) && empty($password)) {
        $error_message = "(!)username and password are required.";
    } else {
        if ($username == "admin" && $password == "admin") {
            header("Location: index.php");
            exit();
        } else {
           
            $error_message = "(!)Invalid username and password";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            top: 20px; /* Adjust this value to position the logo vertically */
            left: 20px; /* Adjust this value to position the logo horizontally */
            z-index: 1; /* Ensure the logo is on top of other content */
            color: #f4d35e; /* Text color */
            font-size: 24px; /* Font size */
            font-weight: bold; /* Font weight */
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
        <form action="admin_button.php" method="POST">
            <div class="form-group">
                <input type="text" name="username" placeholder="username"><br><br>
                <input type="password" name="password" placeholder="Password"><br><br>
                <button type="submit" name="login">Login</button>
            </div>
              <?php
            if (isset($error_message)) {
                echo '<p class="error-message">' . $error_message . '</p>';
            }
            // PHP logic to process student login can go here
            ?>
        </form>
    </div>
</body>
</html>