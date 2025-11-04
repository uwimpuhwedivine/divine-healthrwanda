<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Health Rwanda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .welcome { background: #f8f9fa; padding: 20px; border-radius: 5px; }
        .logout { color: #dc3545; text-decoration: none; padding: 10px; }
        .logout:hover { color: #c82333; }
    </style>
</head>
<body>
    <h2>Welcome to Your Dashboard - Divine</h2>
    
    <div class="welcome">
        <h3>Hello, <?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?>!</h3>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <p>Welcome to the Health Rwanda system. This is your personal dashboard.</p>
    </div>
    
    <br>
    <a href="logout.php" class="logout">Logout</a>
</body>
</html>