<?php

namespace Vroom\Response;

class Response
{
    public function redirect(string $url)
    {
        header("Location: $url");
    }
}