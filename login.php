<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
           body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('bg2.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .background-logo {
            position: absolute;
            top: 15px; 
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
        .button-link {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #1d3557;
            color: white;
            border: none;
            border-radius:20px;
            transition: background-color 0.3s;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            width: 138px; /* Set the same width as the buttons */
            text-align: center; /* Center the text horizontally */
            margin-bottom: 20px; /* Added space between the buttons */
        }

        .button-link:hover {
            background-color: #457b9d;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
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
        <form action="login.php" method="POST">
            <div class="form-group">
                <a href="student_button.php" class="button-link">Student</a><br>
                <a href="admin_button.php" class="button-link">Administrator</a><br>
            </div>

            <?php
            if (isset($error_message)) {
                echo '<p class="error-message">' . $error_message . '</p>';
            }
            ?>
        </form>
    </div>
</body>
</html>
