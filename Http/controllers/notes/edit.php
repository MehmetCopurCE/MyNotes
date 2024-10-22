<?php

use Core\Database;

$currentUserId = 1;

$config = require base_path("config.php");
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrAbort();

authorized($note['user_id'] == $currentUserId);

view('/notes/edit.view.php', [
    'header' => "Edit Note",
    'note' => $note,
    'errors' => []
]);