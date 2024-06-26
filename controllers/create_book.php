<?php
include_once  "../database/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    $sql = "INSERT INTO crud (title, author, genre, publication_year) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $author, $genre, $publication_year);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: /?success=true');
        exit;
    } else {
        header('Location: /?error=true');
        $conn->close();
        exit;
    }
}
