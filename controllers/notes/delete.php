<?php

use Core\Database;

$currentUserId = 1;

$config = require base_path("config.php");
$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrAbort();

authorized($note['user_id'] == $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

header('Location: /notes');
exit();