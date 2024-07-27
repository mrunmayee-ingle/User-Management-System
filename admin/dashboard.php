<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task5";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$active_count = $conn->query("SELECT COUNT(*) AS count FROM form WHERE status = 1")->fetch_assoc()['count'];
$inactive_count = $conn->query("SELECT COUNT(*) AS count FROM form WHERE status = 2")->fetch_assoc()['count'];
$pending_count = $conn->query("SELECT COUNT(*) AS count FROM form WHERE status = 0")->fetch_assoc()['count'];

$conn->close();

include '../task4/header.html';
include 'dashboard.html';
include '../task4/footer.html';
?>

