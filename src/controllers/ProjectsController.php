<?php

namespace App\Trello\controllers;

use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class ProjectsController extends AbstractController
{
    public function index()
    {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        
        $projectModel = new ProjectModel();
        
        if(!empty($title)) {
            $projectModel->create($title, $description);
        }
        
        
        $projects = array_chunk($projectModel->findAll(), 3);

        $this->render('home', [
            'projects' => $projects
        ]);
    }
}