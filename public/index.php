<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "Core/functions.php";


/*
 Autoload classes
 require BASE_PATH . "Core/Database.php";
 Description: Autoload classes using spl_autoload_register function and anonymous function to require the class file
 Parameters: $class
 Return: require base_path("Core{$class}.php")
*/

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path("/{$class}.php");
});

require base_path("bootstrap.php");

$router = new Core\Router();
require base_path("routes.php");
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);

