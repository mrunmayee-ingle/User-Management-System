<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "task5";
   
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $aadhar = $_POST['aadhar'];
    $cname = $_POST['cname'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $address3 = $_POST['address3'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $sql = "INSERT INTO `form`(`fname`, `lname`, `dob`, `email`, `pan`, `gst`, `aadhar`, 
                              `cname`, `gender`, `mobile`, `address1`, `address2`, `address3`, 
                              `country`, `state`, `city`, `pincode`) VALUES 
                              ('$fname','$lname','$dob','$email','$pan',
                              '$gst','$aadhar','$cname','$gender','$mobile',
                              '$address1','$address2','$address3','$country','$state',
                              '$city','$pincode')";

    if ($conn->query($sql) === TRUE) 
    {
        $form_id = $conn->insert_id;
        echo "New record created successfully ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $log_sql = "INSERT INTO `login`(`form_id`,`username`, `password`) VALUES ('$form_id','$username','$password')";

    if ($conn->query($log_sql) === TRUE) 
    {
        echo "New record created successfully ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>