<?php

namespace Vroom\Core;

use Vroom\Routing\Router;

class Application
{
    public Request $request;
    public Router $router;

    public function __construct() 
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}