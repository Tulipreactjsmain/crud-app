<?php


// $host = $_ENV['DB_HOST'];
// $username = $_ENV['DB_USERNAME'];
// $password = $_ENV['DB_PASSWORD'];
// $database = $_ENV['DB'];

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection to MySQL server failed: " . mysqli_connect_error());
}

$conn->set_charset("utf8");


// Method to create new database in AWS sql RDS 

// $new_database = 'new_database';

// // SQL statement to create a new database
// $query = "CREATE DATABASE $new_database";

// // Execute the query to create the database
// if (mysqli_query($conn, $query)) {
//     echo "Database '$new_database' created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }






// $query = "SHOW DATABASES";
// $query = "SHOW GRANTS";

// $result = mysqli_query($conn, $query);

// if (!$result) {
//     die("Query failed: " . mysqli_error($conn));
// }

// echo "Grants for user '$username':<br>";
// while ($row = mysqli_fetch_array($result)) {
//     echo $row[0] . "<br>";
// }

// echo "List of databases:";
// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['Database'] . "<br>";
// }

// mysqli_free_result($result);

// mysqli_close($conn);

// if (!mysqli_select_db($conn, $database)) {
//     die("Failed to select database: " . mysqli_error($conn));
// }

// echo "Connected to database successfully";