<?php

namespace App\Trello\controllers;

class Error404Controller
{
    public function index()
    {

        
        $this->render('404');

    }

    private function render($view, $data = [])
    {
        extract($data);
        include __DIR__ .'/../views/'.$view.'.php';
    }
}