<?php
use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_errors = [];
    $body = $_POST['body'];

    if(!Validator::string($body, 1, 1000)){
        $_errors['body'] = "The body should be between 1 and 1000 characters";
    }

    $errors = $_errors;

    if(empty($errors)){
       $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
           'body' => $body,
           'user_id' => 1
           ]);

        // Redirect to the notes page
        header('Location: /notes');
    }
}

view('/notes/create.view.php', [
    'header' => "Create Node!",
    'errors' => $errors
]);


