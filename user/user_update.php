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

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $aadhar = $_POST['aadhar'];
    $cname = $_POST['cname'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $sql = "UPDATE form SET 
            fname = '$fname', 
            lname = '$lname', 
            dob = '$dob', 
            email = '$email', 
            gender = '$gender', 
            mobile = '$mobile', 
            pan = '$pan', 
            gst = '$gst', 
            aadhar = '$aadhar', 
            cname = '$cname', 
            address1 = '$address1', 
            address2 = '$address2', 
            address3 = '$address3', 
            country = '$country', 
            state = '$state', 
            city = '$city', 
            pincode = '$pincode' 
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: user_details.php?id=$id");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
