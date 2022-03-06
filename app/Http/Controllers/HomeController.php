<?php

namespace App\Http\Controllers;

use Vroom\Core\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }
}
