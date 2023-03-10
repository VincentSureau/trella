<?php

namespace App\Trello;

use AltoRouter;
use App\Trello\controllers\ControllerInterface;

class Application
{
    private $router;
    private $config;

    public function __construct()
    {
        $this->config = $this->getConfig();
        $this->router = new AltoRouter();
        $this->defineRoutes();
    }

    private function defineRoutes()
    {
        $this->router->setBasePath($this->config['BASE_PATH']);
        $this->router->map('GET|POST', '/', 'ProjectsController', 'home');
        $this->router->map('GET|POST', '/board/[i:project_id]', 'BoardController', 'board_index');
        $this->router->map('POST', '/board/add', 'ProjectsController', 'board_add');
        $this->router->map('POST', '/board/[i:project_id]/delete', 'DeleteProjectController', 'board_delete');
        $this->router->map('POST', '/board/[i:project_id]/list/add', 'BoardController', 'list_add');
        $this->router->map('GET', '/board/[i:project_id]/list/[i:list_id]/delete', 'DeleteListController', 'list_delete');
        $this->router->map('POST', '/board/[i:project_id]/list/[i:list_id]/card/add', 'AddCardController', 'card_add');
        $this->router->map('GET', '/board/[i:project_id]/list/[i:list_id]/card/[i:card_id]/delete', 'DeleteCardController', 'card_delete');
        $this->router->map('POST', '/list/update_order', 'UpdateListOrderController', 'list_update_order');
        $this->router->map('POST', '/card/update_order', 'UpdateCardOrderController', 'card_update_order');
        $this->router->map('POST', '/card/update_list', 'UpdateCardListController', 'card_update_list');
    }

    public function getRouter()
    {
        return $this->router;
    }

    public function getConfig()
    {
        if(empty($this->config)) {
            return parse_ini_file(__DIR__ . '/..'. '/config.ini');
        }
        return $this->config;
    }

    public function run()
    {
        $match = $this->router->match();
        $controller_name = $match["target"] ?? "Error404Controller";
        $controller_name = 'App\Trello\controllers\\' . $controller_name;
        
        if(!is_subclass_of($controller_name, ControllerInterface::class))
        {
            throw new \Exception("Erreur: le controller " . $controller_name . ' doit implémenter l\'interface ' . ControllerInterface::class);
        }
        
        $controller = new $controller_name($this, $match['params'] ?? []);
        $controller->index();        
    }
}
