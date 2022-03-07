<?php

namespace Vroom\Support;

use Vroom\Application;

class Env
{
    public function __construct()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable(base_path());
        $dotenv->load();
    }

    public static function get($key, $default = null)
    {
        return $key && $_ENV[$key] ? $_ENV[$key] : $default;
    }
}