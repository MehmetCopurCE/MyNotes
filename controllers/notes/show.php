<?php

use Core\Database;

$currentUserId = 1;

$config = require base_path("config.php");
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrAbort();

    authorized($note['user_id'] == $currentUserId);

    $db->query('delete from notes where id = :id', ['id' => $_GET['id']]);

    header('Location: /notes');
    exit();
}else{
    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrAbort();

    authorized($note['user_id'] == $currentUserId);

    view('/notes/show.view.php', [
        'header' => "Note",
        'note' => $note
    ]);

}


