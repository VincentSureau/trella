<?php

require_once "vendor/autoload.php";

$page = $_GET["page"] ?? 'projects';

$pages = [
    'projects' => 'ProjectsController',
    'board' => 'BoardController',
    '404' => "404"
];

if(!isset($pages[$page])) {
    $page = 404;
}


include "src/controllers/".$pages[$page].".php";
