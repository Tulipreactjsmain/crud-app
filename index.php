<?php
require __DIR__ . '/vendor/autoload.php';
include_once 'config.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
setcookie('searchResult', '', time() - 3600, "/");
setcookie('searchQuery', '', time() - 3600, "/");
setcookie('updatePayload', '', time() - 3600, "/");


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud App</title>
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:#F5F5F5;">

    <div class="disclaimer-container1">
        <div class="disclaimer-text">
            This website uses cookies to ensure you get the best experience. By continuing to browse the site, you agree to our use of cookies. Please ensure you are viewing this website on a <a href="#" class="browser-link">supported browser</a>.
        </div>
    </div>
    <div class="disclaimer-container2">
        <div class="disclaimer-text">
            This website uses cookies to ensure you get the best experience. By continuing to browse the site, you agree to our use of cookies. Please ensure you are viewing this website on a <a href="#" class="browser-link">supported browser</a>.
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Book CRUD Application</h1>
        <div class="col-md-12 my-4">
            <div class="card" style="background-color:#E4DFDD;">
                <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">

                    <span>Book Records</span>
                    <form class="input-group w-auto" method="GET" action="controllers/search_book.php">
                        <button type="submit" class="input-group-text hover-reduce-background"><i class="bi bi-search"></i></button>
                        <div class="form-floating flex-none">
                            <input type="text" class="form-control" id="searchQuery" name="query" placeholder="search book..">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <?php include_once COMPONENTS_DIR . "/book_table_template.php";
                    if (isset($searchQuery)) :  ?>
                        <button onclick="window.location.href = '/';" class="btn btn-primary">Go Back</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 my-4">
                <div class="card" style="background-color:#E4DFDD;">
                    <div class="card-header bg-secondary text-white">
                        <?php
                        echo json_decode($_COOKIE['updatePayload'], true) ?  "Edit book" :  "Add New Book";
                        ?>

                    </div>
                    <div class="card-body">
                        <form id="createForm" method="POST" action=<?php $updatePayload = json_decode($_COOKIE['updatePayload'], true) ?? null;
                                                                    echo $updatePayload ? "controllers/update_book.php" :  "controllers/create_book.php" ?>>
                            <?php if (isset($updatePayload)) : ?>
                                <input type="hidden" name="id" value="<?php echo $updatePayload['id']; ?>">
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $updatePayload['title'] ?? ''; ?>" required pattern="[A-Za-z ]+" minlength="1" title="Title can only contain letters">
                            </div>
                            <div class="form-group">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo $updatePayload['author'] ?? ''; ?>" required pattern="[A-Za-z ]+" minlength="1" title="Author can only contain letters">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre:</label>
                                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $updatePayload['genre'] ?? ''; ?>" required pattern="[A-Za-z ]+" minlength="1" title="Genre can only contain letters">
                            </div>
                            <div class="form-group">
                                <label for="year">Publication Year:</label>
                                <input type="date" class="form-control" id="publication_year" name="publication_year" value="<?php echo $updatePayload['publication_year'] ?? ''; ?>" required>
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