<?php

require_once "vendor/autoload.php";

$page = $_GET["page"] ?? 'projects';

$pages = [
    'projects' => 'home',
    'board' => 'project',
    '404' => "404"
];

if(!isset($pages[$page])) {
    $page = 404;
}


include "src/views/".$pages[$page].".php";
