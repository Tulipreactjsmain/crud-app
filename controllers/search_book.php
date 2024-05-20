<?php
include_once "create_book.php";
include "../database/connection.php";

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $query = "SHOW COLUMNS FROM crud";
    $result = $conn->query($query);

    $columns = [];
    while ($row = $result->fetch_assoc()) {
        if ($row['Field'] !== 'id') { // Exclude 'id' column
            $columns[] = $row['Field'];
        }
    }

    $whereClauses = [];
    foreach ($columns as $column) {
        $whereClauses[] = "$column LIKE CONCAT('%', ?, '%')";
    }

    $sql = "SELECT * FROM crud WHERE " . implode(" OR ", $whereClauses);

    $stmt = $conn->prepare($sql);

    $searchQueries = array_fill(0, count($columns), $searchQuery);

    $stmt->bind_param(str_repeat('s', count($columns)), ...$searchQueries);
    $stmt->execute();
    $searchResult = $stmt->get_result();
    $rows = [];
    while ($row = $searchResult->fetch_assoc()) {
        $rows[] = $row;
    }
    $searchResultJSON = json_encode($rows);

    setcookie('searchResult', $searchResultJSON, 0, "/"); 
    setcookie('searchQuery', $searchQuery, 0, "/");
    $conn->close();

    if ($searchResult) {
        header("Location: /?search=$searchQuery");
    };
}
