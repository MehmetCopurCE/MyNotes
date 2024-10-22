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
$router->get('/notes', 'controllers/notes/index.php')->only('auth');

$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes/create', 'controllers/notes/create.php')->only('auth');

$router->get('/note', 'controllers/notes/show.php')->only('auth');
$router->patch('/note', 'controllers/notes/update.php')->only('auth');
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');

$router->delete('/note/delete', 'controllers/notes/delete.php')->only('auth');

$router->get('/contact', 'controllers/contact.php');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/login', 'controllers/session/store.php')->only('guest');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->delete('/logout', 'controllers/session/destroy.php')->only('auth');

