<?php

namespace Vroom\Routing;

class Route
{
    use RegisterRoutesTrait;

    public static function get($path, $callback)
    {
        self::registerRoute('get', $path, $callback);
    }
}
