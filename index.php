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

        button {
            width: 100px !important;
            margin: 5px !important;
        }

        .btn-primary {
            background-color: #33AAFF !important;
            border: #33AAFF !important;
        }

        .btn-danger {
            background-color: #FF5C5C !important;
            border: #FF5C5C !important;
        }

        thead {
            vertical-align: top !important;
        }

        form.input-group {
            margin: 0 !important;
        }

        .input-group {
            flex-wrap: nowrap !important;
        }

        .input-group>.form-floating {
            flex: none !important;
            width: auto !important;
            min-width: none !important;
        }

        .input-group .form-control {
            width: auto !important;
            min-width: 0 !important;
            min-height: 0 !important;
            height: 39px !important;
        }

        .form-control::placeholder {
            color: black !important;
        }

        .form-control:focus {
            padding-top: 0 !important;
            padding-bottom: 0 !important;

        }

        .bi-search {
            color: black !important;
            display: flex !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:#F5F5F5;">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Book CRUD Application</h1>
        <div class="col-md-12 my-4">
            <div class="card" style="background-color:#E4DFDD;">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">

                    <span>Book Records</span>

                    <form class="input-group w-auto" method="GET" action=<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/search.php"; ?>>
                        <span class="input-group-text"><span><i class="bi bi-search"></i></span></span>
                        <div class="form-floating flex-none">
                            <input type="text" class="form-control" id="searchQuery" name="query" placeholder="search book..">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <?php include_once "./components/book_table_template.php";
                    if (is_array($books) && in_array("No matching books found", $books)) :  ?>
                        <button onclick="history.go(-1);" class="btn btn-primary">Go Back</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 my-4">
                <div class="card" style="background-color:#E4DFDD;">
                    <div class="card-header bg-secondary text-white">
                        Add New Book
                    </div>
                    <div class="card-body">
                        <form id="createForm" method="POST" action=<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/create_book.php"; ?>>
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
        </div>
    </div>
</body>

</html>