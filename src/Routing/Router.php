<?php

namespace Vroom\Routing;

use Vroom\Core\Request;

class Router
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = Route::$routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Not Found";
            exit();
        }

        echo call_user_func($callback);
    }

}