<?php

namespace App\Http\Controllers;

use Vroom\Controller\Controller;
use Vroom\Request\Request;
use Vroom\Response\Response;

class HomeController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }

    public function post(Request $request, Response $response)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'email' => ['required']
        ]);

        if (! $validation) {
            return $response->redirect('/');
        }

        return 'Validation Passed';
    }
}
