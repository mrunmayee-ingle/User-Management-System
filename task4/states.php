<?php
function getStates() {
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "task5";

    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $states = "";
    $sql = "SELECT name FROM state";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $states .= "<option value='{$row['name']}'>{$row['name']}</option>";
    }

    $conn->close();
    return $states;
}
?>
