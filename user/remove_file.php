<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "task5";

$conn = new mysqli($db_server, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Get the file name from the database
    $stmt = $conn->prepare("SELECT file_name FROM documents WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $file = $result->fetch_assoc();

    if ($file) {
        $file_path = "../upload/" . $file['file_name'];

        // Delete the file from the server
        if (unlink($file_path)) {
            // Delete the file record from the database
            $stmt = $conn->prepare("DELETE FROM documents WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete record from the database.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete file from the server.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'File not found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
