<?php

namespace Core\Middleware;

class Middleware
{
    const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve($key){
        if (!$key){
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware){
            throw new \Exception("Middleware not found for key: {$key}");
        }

        (new $middleware)->handle();
    }
}