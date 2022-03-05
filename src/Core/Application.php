<?php

namespace Vroom\Core;

use Vroom\Routing\Router;

class Application
{
    public static string $ROOT_PATH;
    public static string $CONFIG_PATH;

    public Request $request;
    public Router $router;
    public Configuration $config;

    public function __construct() 
    {
        self::$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
        self::$CONFIG_PATH = $_SERVER['DOCUMENT_ROOT'].'/../config';
        
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->config = new Configuration();
    }

    public function run()
    {
        $this->router->resolve();
    }
}