<?php

use App\Http\Controllers\HomeController;
use Vroom\Routing\Route;

Route::get('/', [HomeController::class, 'home']);
