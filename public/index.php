<?php

use Vroom\Application;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

$db = new \Vroom\Database\Database();
$db->applyMigrations();

$app->run();

