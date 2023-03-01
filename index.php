<?php

use \AltoRouter;
use App\Trello\controllers\ControllerInterface;

require_once "vendor/autoload.php";

$config = parse_ini_file(__DIR__ . '/config.ini');

$router = new AltoRouter();
$router->setBasePath($config['BASE_PATH']);

$router->map('GET|POST', '/', 'ProjectsController', 'home');
$router->map('GET|POST', '/board/[i:project_id]', 'BoardController', 'board_index');
$router->map('POST', '/board/add', 'ProjectsController', 'board_add');
$router->map('POST', '/board/[i:project_id]/delete', 'DeleteProjectController', 'board_delete');
$router->map('POST', '/board/[i:project_id]/list/add', 'BoardController', 'list_add');
$router->map('GET', '/board/[i:project_id]/list/[i:list_id]/delete', 'DeleteListController', 'list_delete');
$router->map('POST', '/board/[i:project_id]/list/[i:list_id]/card/add', 'AddCardController', 'card_add');
$router->map('GET', '/board/[i:project_id]/list/[i:list_id]/card/[i:card_id]/delete', 'DeleteCardController', 'card_delete');
$router->map('POST', '/list/update_order', 'UpdateListOrderController', 'list_update_order');
$router->map('POST', '/card/update_order', 'UpdateCardOrderController', 'card_update_order');
$router->map('POST', '/card/update_list', 'UpdateCardListController', 'card_update_list');

$match = $router->match();
$controller_name = $match["target"] ?? "Error404Controller";

$controller_name = 'App\Trello\controllers\\' . $controller_name;

if(!is_subclass_of($controller_name, ControllerInterface::class))
{
    throw new \Exception("Erreur: le controller " . $controller_name . ' doit implémenter l\'interface ' . ControllerInterface::class);
}

$controller = new $controller_name($match['params'] ?? [], $router);
$controller->index();