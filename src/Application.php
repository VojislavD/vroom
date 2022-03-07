<?php

namespace Vroom;

use Vroom\Configuration\Configuration;
use Vroom\Database\Database;
use Vroom\Request\Request;
use Vroom\Routing\Router;

class Application
{
    public static string $ROOT_PATH;
    public static string $CONFIG_PATH;

    public Request $request;
    public Router $router;
    public Configuration $config;
    public Database $database;

    public function __construct() 
    {
        self::$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
        self::$CONFIG_PATH = $_SERVER['DOCUMENT_ROOT'].'/../config';
        
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->config = new Configuration();
        $this->database = new Database();
    }

    public function run()
    {
        $this->router->resolve();
    }
}