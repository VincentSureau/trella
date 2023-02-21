<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class DeleteProjectController extends AbstractController
{
    public function index()
    {
        $projectModel = new ProjectModel();
        $listModel = new ListModel();

        $project_id = $_GET['projectId'];
        
        if(!empty($project_id)) {
            $lists = $listModel->findByProject($project_id);
            foreach($lists as $list) {
                $listModel->delete($list->getId(), $list->getProjectId());
            }
            $projectModel->delete($project_id);
        }
        
        header('Location: ?page=projects');
        exit();
    }
}
