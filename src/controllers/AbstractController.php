<?php

namespace App\Trello\controllers;

use App\Trello\controllers\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    protected function render($view, $data = [])
    {
        extract($data);
        include __DIR__ .'/../views/'.$view.'.php';
    }

    protected function redirect($route)
    {
        header('Location: ' . $route);
        exit();
    }

    abstract public function index();
}