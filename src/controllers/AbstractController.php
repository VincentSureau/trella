<?php

namespace App\Trello\controllers;

use AltoRouter;
use App\Trello\controllers\ControllerInterface;

abstract class AbstractController implements ControllerInterface
{
    protected $params;
    protected $router;

    public function __construct(array $params = [], AltoRouter $router)
    {
        $this->params = $params;
        $this->router = $router;
    }

    protected function render($view, $data = []): void
    {
        extract($data);
        $router = $this->router;
        include __DIR__ .'/../views/'.$view.'.php';
    }

    protected function redirect($route) : void
    {
        header('Location: ' . $route);
        exit();
    }

    abstract public function index(): void;

    /**
     * Get the value of a param
     */ 
    public function getParam($key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }
}