<?php
include "../database/connection.php";

$message = "";

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":

        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $publication_year = $_POST['publication_year'];

        $sql = "UPDATE `crud` SET title=?, author=?, genre=?, publication_year=? WHERE id=?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssss", $title, $author, $genre, $publication_year, $id);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                header("Location: /?updateSucess");

                exit();
            } else {
                $message = "Failed to update record.";
                header("Location: /?updateFailure");
            }

            $stmt->close();
        } else {
            $message = "Error preparing statement: " . $conn->error;
        }
        break;
        
    case "GET":
        $id = $_GET['id'];
        $sql = "SELECT * FROM `crud` WHERE id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $book = $result->fetch_assoc();

            $bookData = json_encode($book);
            setcookie('updatePayload', $bookData, 0, "/");

            if (isset($book)) {
                header("Location: /?update=$id");
                exit();
            }
            $stmt->close();
        } else {
            $message = "Error preparing statement: " . $conn->error;
        }
        break;

    default:
        $message = "Unsupported request method.";
}

echo $message;

$conn->close();

