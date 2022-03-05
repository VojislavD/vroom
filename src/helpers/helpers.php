<?php

if (!function_exists('dd')) {
    function dd($value) {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die;
    }
}