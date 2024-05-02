<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/schema.php"; 
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/connection.php";

$sql = "SELECT * FROM crud";
$result = $conn->query($sql);
$result = $conn->query($sql);
if (!$result) {
    echo "Database error: " . $conn->error;
    error_log("Database error: " . $conn->error);
}

$books = [];
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

$conn->close();
return $books;
