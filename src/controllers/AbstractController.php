<?php

namespace App\Trello\controllers;

abstract class AbstractController
{
    protected function render($view, $data = [])
    {
        extract($data);
        include __DIR__ .'/../views/'.$view.'.php';
    }

    abstract public function index();
}