<?php
// Database connection logic
include_once "connection.php";

// Fetch data from the database
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

$books = [];
if ($result->num_rows > 0) {
    // Fetch each row as an associative array
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

// Close connection
$conn->close();

// Return the fetched data
return $books;
?>
