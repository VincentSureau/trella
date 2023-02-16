<?php

require_once __DIR__ . '/../models/Projet.php';

dump($_POST);

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;

if(!empty($title)) {
    create($title, $description);
}


$projects = array_chunk(findAll(), 3);

include __DIR__ .'/../views/project.php';