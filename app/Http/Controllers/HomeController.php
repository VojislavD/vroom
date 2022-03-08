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
        $validation = $request->validate([
            'name' => ['required'],
            'email' => ['required']
        ]);

        if (! $validation) {
            return 'Validation Failed';
        }

        return 'Validation Passed';
    }
}
