<?php
require __DIR__ . '/vendor/autoload.php';
 
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud App</title>
    <style>
        input {
            background-color: #F5F5F5 !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:#F5F5F5;">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Book CRUD Application</h1>
        <div class="row">
            <div class="col-md-6 my-4">
                <div class="card" style="background-color:#E4DFDD;">
                    <div class="card-header bg-secondary text-white">
                        Add New Book
                    </div>
                    <div class="card-body">
                        <form id="createForm" method="POST" action="/controllers/create_book.php">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre:</label>
                                <input type="text" class="form-control" id="genre" name="genre" required>
                            </div>
                            <div class="form-group">
                                <label for="year">Publication Year:</label>
                                <input type="number" class="form-control" id="publication_year" name="publication_year" required>
                            </div>
                            <button type="submit" class="btn mt-3" style="background-color:#CED0CE;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 my-4">
                <div class="card" style="background-color:#E4DFDD;">
                    <div class="card-header bg-secondary text-white">
                        Book Records
                    </div>
                    <div class="card-body">
                        <?php include_once "./components/book_table_template.php"; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</body>

</html>