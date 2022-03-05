<?php

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