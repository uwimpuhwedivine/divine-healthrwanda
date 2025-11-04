<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $gender = $_POST['gender'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare and execute SQL
    $sql = "INSERT INTO users (first_name, last_name, gender, email, password) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $first_name, $last_name, $gender, $email, $hashed_password);
    
    if ($stmt->execute()) {
        header("Location: login.php?message=Registration successful");
        exit();
    } else {
        if ($conn->errno == 1062) {
            die("Email already exists. <a href='registration.php'>Try again</a>");
        } else {
            die("Error: " . $conn->error);
        }
    }
    
    $stmt->close();
}
$conn->close();
?>