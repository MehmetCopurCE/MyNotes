<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "functions.php";

/*
 Autoload classes
 require BASE_PATH . "Core/Database.php";
 Description: Autoload classes using spl_autoload_register function and anonymous function to require the class file
 Parameters: $class
 Return: require base_path("Core{$class}.php")
*/

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});


require base_path("router.php");

