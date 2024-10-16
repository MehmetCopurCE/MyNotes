<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $value)
    {
        $this->bindings[$key] = $value;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No {$key} is bound in the container");
        }

        if (array_key_exists($key, $this->bindings)) {
            $resolver =  $this->bindings[$key];
            return call_user_func($resolver);
        }
    }

}