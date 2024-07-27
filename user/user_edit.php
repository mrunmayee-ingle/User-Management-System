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
    $sql = "SELECT * FROM form WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    } else {
        echo "No data found for this user.";
        exit;
    }

    $fname = $user_data['fname'];
    $lname = $user_data['lname'];
    $dob = $user_data['dob'];
    $email = $user_data['email'];
    $pan = $user_data['pan'];
    $gst = $user_data['gst'];
    $aadhar = $user_data['aadhar'];
    $cname = $user_data['cname'];
    $gender = $user_data['gender'];
    $mobile = $user_data['mobile'];
    $address1 = $user_data['address1'];
    $address2 = $user_data['address2'];
    $address3 = $user_data['address3'];
    $country = $user_data['country'];
    $state = $user_data['state'];
    $city = $user_data['city'];
    $pincode = $user_data['pincode'];

    $conn->close();

    include 'user_header.php';
    include 'user_edit.html';
?>
