<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task5";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$state_name = $_POST['state'];
if ($state_name != '')
{
    $sql = "SELECT name FROM city WHERE state='$state_name'";
    $result = $conn->query($sql);

    $cities = "<option value=''>Select your city</option>";
    while ($row = $result->fetch_assoc()) {
        $cities .= "<option value='{$row['name']}'>{$row['name']}</option>";
    }
    echo $cities;
}

$conn->close();
?>

