<?php

namespace App\Trello\controllers;

use AltoRouter;
use App\Trello\Application;
use App\Trello\controllers\ControllerInterface;
use App\Trello\utils\Renderer\PHPTemplateFactory;
use App\Trello\utils\Renderer\SmartyTemplateFactory;
use Smarty;

abstract class AbstractController implements ControllerInterface
{
    protected $params;
    protected $router;
    protected $application;

    public function __construct(Application $application, array $params = [])
    {
        $this->params = $params;
        $this->router = $application->getRouter();
        $this->application = $application;
    }

    public function render($view, $data = [])
    {
        $templateEngine = $this->application->getConfig()['TEMPLATE_ENGINE'] ?? 'SMARTY';
        switch($templateEngine) {
            case 'PHP':
                $renderer = (new PHPTemplateFactory()) ->getRenderer();
                break;
            case 'SMARTY':
                $renderer = (new SmartyTemplateFactory())->getRenderer();
                break;
            default:
                throw new \Exception("Le moteur de template $templateEngine n'existe pas");
                break;
        }
        $data['router'] = $this->router;
        echo $renderer->render($view, $data);
    }

    protected function sendJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function redirect($route,$params = [], $queryParams = []) : void
    {
        header('Location: ' . $this->router->generate($route, $params) . "?" . http_build_query($queryParams));
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