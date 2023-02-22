<?php

namespace App\Trello\controllers;

use App\Trello\controllers\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    protected function render($view, $data = []): void
    {
        extract($data);
        include __DIR__ .'/../views/'.$view.'.php';
    }

    protected function redirect($route) : void
    {
        header('Location: ' . $route);
        exit();
    }

    abstract public function index(): void;
}