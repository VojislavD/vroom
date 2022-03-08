<?php

namespace App\Http\Controllers;

use Vroom\Controller\Controller;
use Vroom\Request\Request;

class HomeController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }

    public function post(Request $request)
    {
        dd($request->body());
    }
}
