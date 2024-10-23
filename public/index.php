<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "Core/functions.php";
require BASE_PATH . "vendor/autoload.php";

session_start();

/*
 Autoload classes
 require BASE_PATH . "Core/Database.php";
 Description: Autoload classes using spl_autoload_register function and anonymous function to require the class file
 Parameters: $class
 Return: require base_path("Core{$class}.php")
*/

//spl_autoload_register(function ($class) {
//    $class = str_replace('\\', '/', $class);
//    require base_path("/{$class}.php");
//});

require base_path("bootstrap.php");

$router = new Core\Router();
require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {

    Session::flash('errors', $exception->errors());
    Session::flash('old', $exception->old());

    redirect($router->previousUrl());

}

Session::unFlash();

