<?php
session_start();

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task5";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['status'] == 1 && $user['isAdmin'] == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../admin/dashboard.php");
            exit();
        } elseif ($user['status'] == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['form_id'];
            header("Location: ../user/user_details.php?id=" . $user['id']);
            exit();
        } else {
            header("Location: ../admin/login.php?msg=not_approved");
            exit();
        }
    } else {
        header("Location: ../admin/login.php?msg=inc");
        exit();
    }
}

$conn->close();
?>

