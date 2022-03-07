<?php

use Vroom\Application;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Application();

//start:temp
$db = new \Vroom\Database\Database();
$db->applyMigrations();
//end:temp

$app->run();

