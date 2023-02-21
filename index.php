<?php

require_once "vendor/autoload.php";

$page = $_GET["page"] ?? 'projects';

$pages = [
    'projects' => 'ProjectsController',
    'board' => 'BoardController',
    '404' => "Error404Controller"
];

if(!isset($pages[$page])) {
    $page = 404;
}

$controller_name = 'App\Trello\controllers\\' . $pages[$page];
$controller = new $controller_name();
$controller->index();