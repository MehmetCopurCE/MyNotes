<?php

namespace Core;

use Core\Middleware\Middleware;

class Router{
    protected $routes = [];

    protected function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get($uri, $controller){
        return $this->add('GET', $uri, $controller);
    }

    public function delete($uri, $controller){
        return $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add('PATCH', $uri, $controller);
    }
    public function put($uri, $controller){
        return  $this->add('PUT', $uri, $controller);
    }
    public function post($uri, $controller){
        return $this->add('POST', $uri, $controller);
    }

    public function route($uri, $method){
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware'] ?? null);

                return require base_path("Http/controllers/" . $route['controller']);
            }
        }

        //Abort the request
        $this->abort();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}

//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//function routerToController($uri, $routes){
//    if (array_key_exists($uri, $routes)) {
//        require base_path($routes[$uri]);
//    } else {
//        abort();
//    }
//}



//$routes = require base_path('routes.php');
//routerToController($uri, $routes['routes']);
