<?php

namespace Vroom\Configuration;

use Vroom\Support\Env;

class Configuration
{
    public function __construct()
    {
        $this->initializeDotenv();
    }
    
    private function initializeDotenv()
    {
        new Env();
    }

    public static function getConfigFile($name) 
    {
        return config_path($name.'.php');
    }
}