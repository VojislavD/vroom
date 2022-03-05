<?php

use Vroom\Core\Configuration;
use Vroom\Support\Env;

if (! function_exists('base_path')) {
    function base_path($file = null) {
        $root =  $_SERVER['DOCUMENT_ROOT']."/../";

        if (! $file) {
            return $root;
        }

        return file_exists($root.$file) ? require $root.$file : null;
    }
}

if (! function_exists('config')) {
    function config(string $path) {
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

if (! function_exists('config_path')) {
    function config_path($file = null) {
        $config =  $_SERVER['DOCUMENT_ROOT']."/../config/";

        if (! $file) {
            return $config;
        }
        
        return file_exists($config.$file) ? require $config.$file : null;

    }
}

if (! function_exists('dd')) {
    function dd($value) {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die;
    }
}

if (! function_exists('env')) {
    function env($key, $default = null) {
        return Env::get($key, $default);
    }
}

if (! function_exists('routes_path')) {
    function routes_path($file = null) {
        $config =  $_SERVER['DOCUMENT_ROOT']."/../routes/";

        if (! $file) {
            return $config;
        }
        
        return file_exists($config.$file) ? require $config.$file : null;

    }
}
