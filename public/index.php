<?php

use Vroom\Core\Application;
use Vroom\Routing\Route;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

Route::get('/', function () {
    return 'Home';
});

Route::get('/hello', function () {
    return 'Hello World';
});

$app->run();

