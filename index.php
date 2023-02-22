<?php

use App\Trello\controllers\ControllerInterface;

require_once "vendor/autoload.php";

$page = $_GET["page"] ?? 'projects';

$pages = [
    'projects' => 'ProjectsController',
    'board' => 'BoardController',
    '404' => "Error404Controller",
    "delete_list" => 'DeleteListController',
    "delete_project" => 'DeleteProjectController',
    "add_card"=>'AddcardController'
];

if(!isset($pages[$page])) {
    $page = 404;
}

$controller_name = 'App\Trello\controllers\\' . $pages[$page];

if(!is_subclass_of($controller_name, ControllerInterface::class))
{
    throw new \Exception("Erreur: le controller " . $controller_name . ' doit implémenter l\'interface ' . ControllerInterface::class);
}

$controller = new $controller_name();
$controller->index();