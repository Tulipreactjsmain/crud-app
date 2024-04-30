<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $form_data = $_POST;
    print($form_data);

    header('Location: /index.php?success=true');
    exit;
}

