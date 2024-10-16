<?php

use Core\App;
use Core\Validator;

$db = App::resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrAbort();

authorized($note['user_id'] == $currentUserId);

$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)){
    $errors['body'] = "The body should be between 1 and 1000 characters";
}

// If there are errors, redirect back to the form
if (count($errors)) {
    view('/notes/edit.view.php', [
        'header' => "Edit Note",
        'note' => $note,
        'errors' => $errors
    ]);
    return;
}

$db->query('update notes set body = :body where id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);

header('Location: /notes');
die();