<?php

use App\Trello\models\ProjectModel;

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;

$projectModel = new ProjectModel();

if(!empty($title)) {
    $projectModel->create($title, $description);
}


$projects = array_chunk($projectModel->findAll(), 3);

include __DIR__ .'/../views/home.php';