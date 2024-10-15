<?php

//return [
//    'routes' => [
//        "/" => "controllers/index.php",
//        "/about" => "controllers/about.php",
//        "/note" => "controllers/notes/show.php",
//        "/notes" => "controllers/notes/index.php",
//        "/notes/create" => "controllers/notes/create.php",
//        "/contact" => "controllers/contact.php"
//    ],
//];

//Form sadece get ve post methodlarını destekler. Ondan dolayı delete, put, patch gibi methodlar için ayrı bir fonksiyon oluşturuldu.

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/create', 'controllers/notes/create.php');

$router->get('/note', 'controllers/notes/show.php');
$router->patch('/note', 'controllers/notes/update.php');
$router->get('/note/edit', 'controllers/notes/edit.php');

$router->delete('/note/delete', 'controllers/notes/delete.php');

$router->get('/contact', 'controllers/contact.php');

