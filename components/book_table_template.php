<?php
include_once "./controllers/fetch_book.php";

echo "<div class='table-responsive'>";
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

$searchQuery = $_COOKIE['searchQuery'] ?? null;

if (is_array($books) && !in_array("No matching books found '$searchQuery'", $books)) {
    foreach ($books as $book) {
        $bookId = $book["id"];
        echo "<tr>";
        echo "<td>" . $book["title"] . "</td>";
        echo "<td>" . $book["genre"] . "</td>";
        echo "<td>" . $book["author"] . "</td>";
        echo "<td>" . $book["publication_year"] . "</td>";
        echo "<td>";
        echo " <form method='GET' class='btn btn-primary' action='../controllers/update_book.php'>";
        echo "<input type='hidden' name='id' value='$bookId'>";
        echo " <button class='bg-transparent border-0 text-white hover-reduce-background rounded-2' type='submit' >Update</button>";
        echo "</form>";
        echo " <form method='GET' class='btn btn-danger' action='../controllers/delete_book.php'>";
        echo "<input type='hidden' name='id' value='$bookId'>";
        echo " <button class='bg-transparent border-0 text-white hover-reduce-background rounded-2' type='submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr >";
    echo "<td class='py-3' colspan='5'>" . $books[0] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";
