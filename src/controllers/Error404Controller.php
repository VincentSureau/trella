<?php

namespace App\Trello\controllers;

use App\Trello\controllers\AbstractController;

class Error404Controller extends AbstractController
{
    public function index() : void
    {
        $this->render('404');
    }
}