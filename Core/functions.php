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
    require base_path("/views" . $view);
}

function login($user) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout() {
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}