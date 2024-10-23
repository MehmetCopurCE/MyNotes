<?php

use Core\Response;

function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    die();
}

function urlIs($url) {
    return $_SERVER['REQUEST_URI']=== $url;
}

function authorized($condition, $statusCode = Response::FORBIDDEN) {
    if(!$condition){
        abort($statusCode);
    }
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($view, $attributes = []) {
    extract($attributes); // ['header' => 'Dashboard'] => $header = 'Dashboard'
    return require base_path("/views" . $view);
}

function redirect($url) {
    header("Location: {$url}");
    exit();
}

function old($key, $default = '') {
    return \Core\Session::get('old')[$key] ?? $default;
}

