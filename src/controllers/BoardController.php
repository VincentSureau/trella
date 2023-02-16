<?php

require_once __DIR__ . '/../models/Projet.php';
require_once __DIR__ . '/../models/List.php';

$project_id = $_GET['id'];
$title = $_POST['title'] ?? null;

if(!empty($title)) {
    createList($title, $project_id);
}

$project = find($project_id);
$lists = findByProject($project_id);

include __DIR__ .'/../views/project.php';