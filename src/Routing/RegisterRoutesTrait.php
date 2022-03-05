<?php

namespace Vroom\Routing;

trait RegisterRoutesTrait
{
    public static array $routes = [];

    private static function registerRoute($method, $path, $callback)
    {
        self::$routes[$method][$path] = $callback;
    }
}