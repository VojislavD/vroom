<?php

namespace Vroom\Core;

use Vroom\Routing\Router;
use Vroom\Support\Env;

class Application
{
    public static string $ROOT_PATH;

    public Request $request;
    public Router $router;

    public function __construct() 
    {
        self::$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
        
        $this->request = new Request();
        $this->router = new Router($this->request);

        $this->initializeDotenv();
    }

    private function initializeDotenv()
    {
        new Env();
    }

    public function run()
    {
        $this->router->resolve();
    }
}