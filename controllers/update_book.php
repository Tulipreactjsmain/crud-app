<?php
include "../database/connection.php";

$id = $_GET['id'];
$sql = "SELECT * FROM `crud` WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt) {   
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $book = $result->fetch_assoc();

        echo "<pre>";
        var_dump($book);
        echo "</pre>";
        $stmt->close();
    }

$conn->close();