<?php

namespace Vroom\Routing;

class Route
{
    use RegisterRoutesTrait;

    public static function get($path, $callback)
    {
        self::registerRoute('get', $path, $callback);
    }

    public static function post($path, $callback)
    {
        self::registerRoute('post', $path, $callback);
    }
}
