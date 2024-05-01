<?php
$fetchBook = $_SERVER['DOCUMENT_ROOT'] . "/controllers/fetch_book.php";

include_once $fetchBook;

echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Genre</th>";
echo "<th>Author</th>";
echo "<th>Publication Year</th>";
echo "<th>Actions</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($books as $book) {
    echo "<tr>";
    echo "<td>" . $book["title"] . "</td>";
    echo "<td>" . $book["genre"] . "</td>";
    echo "<td>" . $book["author"] . "</td>";
    echo "<td>" . $book["publication_year"] . "</td>";
    echo "<td>";
    echo "<button class='btn btn-primary'>Update</button>";
    echo "<button class='btn btn-danger'>Delete</button>";
    echo "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";