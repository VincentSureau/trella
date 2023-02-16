<?php

require_once __DIR__ . '/../models/List.php';

dump($_POST);

$title = $_POST['title'] ?? null;

if(!empty($title)) {
    create($title);
}


// $projects = array_chunk(findAll(), 3);
$lists = findAll();
dump($lists);
include __DIR__ .'/../views/project.php';