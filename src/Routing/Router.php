<?php

namespace Vroom\Routing;

use Vroom\Request\Request;
use Vroom\Response\Response;

class Router
{
    public Request $request;
    public Response $response;
    private $routesPath;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response = new Response();
        $this->setRoutesPath();
    }

    private function setRoutesPath()
    {
        $this->routesPath = routes_path('web.php');
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = Route::$routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Not Found";
            exit();
        }

        if (is_array($callback)) {
            $controller = new $callback[0]();
            $callback[0] = $controller;
        }

        echo call_user_func($callback, $this->request, $this->response);
    }

}