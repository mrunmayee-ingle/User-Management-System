<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../admin/login.php");
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
    <div class="login-container">
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <p>You have successfully logged in.</p>
    <p><a href="logout.php"><button>Logout</button></a></p>
    </div>
</body>
</html>