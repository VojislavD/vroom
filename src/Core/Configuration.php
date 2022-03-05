<?php

namespace Vroom\Core;

use Vroom\Support\Env;

class Configuration
{
    private string $path;

    public function __construct()
    {
        $this->path = Application::$CONFIG_PATH;
        $this->initializeDotenv();
    }

    private function initializeDotenv()
    {
        new Env();
    }
}