<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/database/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    $sql = "INSERT INTO crud (title, author, genre, publication_year) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $title, $author, $genre, $publication_year);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: /index.php?success=true');
        exit;
    } else {
        header('Location: /index.php?error=true');
        exit;
    }
}
