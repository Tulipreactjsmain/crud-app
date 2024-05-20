<?php
include_once "./database/connection.php";

$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

if (!$result) {
    echo "Database error: " . $conn->error;
    error_log("Database error: " . $conn->error);
}

$books = [];

if (isset($_COOKIE['searchResult'])) {
    $searchResultJSON = $_COOKIE['searchResult'];
    $searchResult = json_decode($searchResultJSON, true);
    $searchQuery = $_COOKIE['searchQuery'];

    if (is_array($searchResult) && !empty($searchResult)) {
        $books = $searchResult;
    } else {
        $books[] = "No matching books found '$searchQuery'";
    }
} elseif ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

$conn->close();
return $books;
