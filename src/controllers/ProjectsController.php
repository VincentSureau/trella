<?php
namespace App\Trello\controllers;
use App\Trello\models\ProjectModel;

class ProjectsController
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
            'projects' => $project
        ]);
    }

    private function render($view, $data = [])
    {
        extract($data);
        include __DIR__ .'/../views/'.$view.'.php';
    }
}