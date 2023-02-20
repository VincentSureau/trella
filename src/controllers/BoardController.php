<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class BoardController extends AbstractController
{
    public function index()
    {
        $listModel = new ListModel();
        $projectModel = new ProjectModel();
        
        $project_id = $_GET['id'];
        $title = $_POST['title'] ?? null;
        
        if(!empty($title)) {
            $listModel->create($title, $project_id);
        }
        
        $project = $projectModel->find($project_id);
        $lists = $listModel->findByProject($project_id);

        $this->render('project', [
            'project' => $project,
            'lists' => $lists
        ]);
    }
}
