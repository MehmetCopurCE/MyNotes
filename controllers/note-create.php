<?php
require('validator.php');

$header = "Create Node!";

$config = require('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $errors = [];
    $body = $_POST['body'];

    if(!Validator::string($body, 1, 1000)){
        $errors['body'] = "The body should be between 1 and 1000 characters";
    }


    if(empty($errors)){
       $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
           'body' => $body,
           'user_id' => 1
           ]);
    }
}


require 'views/note-create.view.php';

