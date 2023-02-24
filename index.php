<?php

use \AltoRouter;
use App\Trello\controllers\ControllerInterface;

require_once "vendor/autoload.php";

$router = new AltoRouter();
$router->setBasePath('/trello');

$router->map('GET|POST', '/', 'ProjectsController', 'home');
$router->map('GET', '/board/[i:project_id]', 'BoardController', 'board_index');
$router->map('POST', '/board/add', 'ProjectsController', 'board_add');
$router->map('GET', '/board/delete', 'DeleteProjectController', 'board_delete');
$router->map('POST', '/list/add', 'BoardController', 'list_add');
$router->map('GET', '/list/delete', 'DeleteListController', 'list_delete');
$router->map('POST', '/card/add', 'AddCardController', 'card_add');
$router->map('POST', '/card/delete', 'DeleteCardController', 'card_delete');

$match = $router->match();
$controller_name = $match["target"] ?? "Error404Controller";

$controller_name = 'App\Trello\controllers\\' . $controller_name;

if(!is_subclass_of($controller_name, ControllerInterface::class))
{
    throw new \Exception("Erreur: le controller " . $controller_name . ' doit implémenter l\'interface ' . ControllerInterface::class);
}

$controller = new $controller_name($match['params'] ?? [], $router);
$controller->index();