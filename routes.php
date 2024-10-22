<?php

//return [
//    'routes' => [
//        "/" => "index.php",
//        "/about" => "about.php",
//        "/note" => "notes/show.php",
//        "/notes" => "notes/index.php",
//        "/notes/create" => "notes/create.php",
//        "/contact" => "contact.php"
//    ],
//];

//Form sadece get ve post methodlarını destekler. Ondan dolayı delete, put, patch gibi methodlar için ayrı bir fonksiyon oluşturuldu.

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/notes', 'notes/index.php')->only('auth');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes/create', 'notes/create.php')->only('auth');

$router->get('/note', 'notes/show.php')->only('auth');
$router->patch('/note', 'notes/update.php')->only('auth');
$router->get('/note/edit', 'notes/edit.php')->only('auth');

$router->delete('/note/delete', 'notes/delete.php')->only('auth');

$router->get('/contact', 'contact.php');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/login', 'session/store.php')->only('guest');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->delete('/logout', 'session/destroy.php')->only('auth');

