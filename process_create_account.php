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

    $stmt = $conn->prepare("INSERT INTO student_acc (name, studentNo, course, section, password) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("sssss", $name, $studentNo, $course, $section, $inputPassword); 

        try {
            if ($stmt->execute()) {
                echo "New record created successfully";
              
                header("Location: student_button.php");
                exit();
            } else {
                echo "Error executing SQL statement";
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                echo "Duplicate entry error: A record with this primary key already exists.";
            } else {
                echo "Error executing SQL statement: " . $e->getMessage();
            }
        }
        
        $stmt->close();
    } else {
        echo "Error preparing SQL statement: " . $conn->error;
    }
    
    $conn->close();
}
?>
