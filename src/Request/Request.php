<?php

namespace Vroom\Request;

use Vroom\Validation\Validation;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        return $position 
            ? substr($path, 0, $position) 
            : $path;
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function isGet()
    {
        return $this->method() === 'get';
    }

    private function isPost()
    {
        return $this->method() === 'post';
    }

    public function body()
    {
        if ($this->isGet()) {
            return $this->sanitize($_GET, INPUT_GET);
        }

        if ($this->isPost()) {
            return $this->sanitize($_POST, INPUT_POST);
        }

        return [];
    }

    private function sanitize($method, $input)
    {
        $body = [];

        foreach ($method as $key => $value) {
            $body[$key] = filter_input($input, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }

    public function validate(array $rules)
    {
        $validation = new Validation($this->body(), $rules);

        return $validation->validate();
    }
}
