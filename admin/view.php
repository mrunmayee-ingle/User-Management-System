<?php
    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "task5";
    $conn = new mysqli($db_server, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT form.id, login.username, form.cname, form.email, form.gst FROM form INNER JOIN login ON form.id = login.form_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data_rows = "";
        while($row = $result->fetch_assoc()) {
            $data_rows .= "<tr>
                            <td>{$row['username']}</td>
                            <td>{$row['cname']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['gst']}</td>
                            <td><a href='edit.php?id={$row['id']}' class='btn edit-button'>View</a></td>
                          </tr>";
        }
        $data = $data_rows;
    } else {
        $data = "<tr><td colspan='4'>No data found</td></tr>";
    }

    $conn->close();

    include 'view.html';
?>
