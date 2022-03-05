<?php

use Vroom\Core\Configuration;
use Vroom\Support\Env;

if (!function_exists('dd')) {
    function dd($value) {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die;
    }
}

if (!function_exists('env')) {
    function env($key, $default = null) {
        return Env::get($key, $default);
    }
}

if (!function_exists('config')) {
    function config($path) {
        $keys = explode('.', $path);

        $file_name = array_shift($keys);
        
        if (! $configFile = Configuration::getConfigFile($file_name)) {
            return null;
        }

        $config = $configFile;

        foreach ($keys as $key) {
            if (!isset($config[$key])) {
                return null;
            }

            $config = $config[$key];
        }

        return $config;
    }
}