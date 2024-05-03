<?php
include "../database/connection.php";


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $bookId = $_GET['id'];
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM crud WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header('Location: /?success=true');
        exit();
    } else {
        $stmt->close();
        $conn->close();
        header('Location: /?error=' . urlencode($errorMessage));
        exit();
    }
}
