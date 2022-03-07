<?php

namespace Vroom;

use Vroom\Configuration\Configuration;
use Vroom\Console\Console;
use Vroom\Database\Database;
use Vroom\Request\Request;
use Vroom\Routing\Router;

class Application
{
    public Request $request;
    public Router $router;
    public Console $console;
    public Configuration $config;
    public Database $database;

    public function __construct($console = null) 
    {
        if ($console === null) {
            $this->request = new Request();
            $this->router = new Router($this->request);
            $this->config = new Configuration();
            $this->database = new Database();
        } else {
            $this->console = new Console();
            $this->config = new Configuration();
        }
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function console($argv)
    {
        $this->console->resolve($argv);
    }
}