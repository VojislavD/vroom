<?php

use Vroom\Core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

$app->router->get('/', function () {
    return 'App initialization';
});

$app->run();

