<?php

namespace Vroom\Core;

class Controller
{
    public function view($name)
    {
        return $this->renderView($name);
    }

    private function renderView($name)
    {
        $viewsPath = $this->getViewsPath();

        if (! $this->viewExists($name)) {
            echo "View Not Found";
            exit();
        }

        include_once $viewsPath.$name.'.php';
    }

    private function getViewsPath()
    {
        return $_SERVER['DOCUMENT_ROOT']."/../resources/views/";
    }

    private function viewExists($name)
    {
        return file_exists($this->getViewsPath().$name.'.php');
    }
}
