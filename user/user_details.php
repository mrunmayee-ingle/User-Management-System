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

$id = $_GET['id'];

$sql = "SELECT * FROM form WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $lname = $row['lname'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $pan = $row['pan'];
    $aadhar = $row['aadhar'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $cname = $row['cname'];
    $gst = $row['gst'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $address3 = $row['address3'];
    $country = $row['country'];
    $state = $row['state'];
    $city = $row['city'];
    $pincode = $row['pincode'];
} else {
    echo "No user found";
    exit;
}

$sql_documents = "SELECT document_type, file_name FROM documents WHERE form_id='$id'";
$result_documents = $conn->query($sql_documents);
$uploaded_documents = [];
if ($result_documents->num_rows > 0) {
    while($row_document = $result_documents->fetch_assoc()) {
        $uploaded_documents[] = $row_document;
    }
}

$conn->close();
include 'user_header.php';
include 'user_details.html';
?>
