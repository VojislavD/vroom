<?php

use Vroom\Routing\Route;

Route::get('/', function () {
    return 'Home';
});

Route::get('/hello', function () {
    return 'Hello World';
});