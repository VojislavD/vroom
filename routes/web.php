<?php

use App\Http\Controllers\HomeController;
use Vroom\Routing\Route;

Route::get('/', [HomeController::class, 'home']);
Route::post('/post', [HomeController::class, 'post']);