<?php

namespace Vroom\Routing;

class Route
{
    public static array $routes = [];

    public static function get($path, $callback)
    {
        self::registerNewRoute('get', $path, $callback);
    }

    private static function registerNewRoute($method, $path, $callback)
    {
        self::$routes[$method][$path] = $callback;
    }
}
