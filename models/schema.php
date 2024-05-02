<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/connection.php";

$tableName = 'crud';
$sql = "SHOW TABLES LIKE '$tableName'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $createTableSQL = "
        CREATE TABLE crud (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            author VARCHAR(255) NOT NULL,
            genre VARCHAR(255) NOT NULL,
            publication_year INT NOT NULL
        )
    ";
    $createTableStmt = $conn->prepare($createTableSQL);
    $createTableStmt->execute();
}

