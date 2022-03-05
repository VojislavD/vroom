<?php

namespace Vroom\Support;

use Vroom\Core\Application;

class Env
{
    public function __construct()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(dirname(Application::$ROOT_PATH));
        $dotenv->load();
    }

    public static function get($key, $default = null)
    {
        dd($_ENV['TEST']);
        return $key ? $_ENV[$key] : $_ENV[$default];
    }
}