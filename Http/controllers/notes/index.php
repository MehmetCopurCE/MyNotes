<?php

use Core\App;
use Core\Database;

//$config = require base_path("config.php");
//$db = new Database($config['database']);

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();


view('/notes/index.view.php', [
    'header' => "My Notes!",
    'notes' => $notes
]);

