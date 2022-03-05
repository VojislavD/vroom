<?php

namespace Vroom\Routing;

use Vroom\Core\Application;
use Vroom\Core\Request;

class Router
{
    public Request $request;
    private $routesPath;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->setRoutesPath();

        $this->loadRoutes();
    }

    private function setRoutesPath()
    {
        $this->routesPath = Application::$ROOT_PATH.'/../routes.php';
    }

    private function loadRoutes()
    {
        require $this->routesPath;
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

        if (is_array($callback)) {
            $controller = new $callback[0]();
            $callback[0] = $controller;
        }

        echo call_user_func($callback);
    }

}