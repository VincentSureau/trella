<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class DeleteProjectController extends AbstractController
{
    public function index() : void
    {
        $projectModel = new ProjectModel();
        $listModel = new ListModel();

        $project_id = $this->getParam("project_id");

        if(!empty($project_id)) {
            $lists = $listModel->findByProject($project_id);
            foreach($lists as $list) {
                $listModel->delete($list->getId(), $list->getProjectId());
            }
            $projectModel->delete($project_id);
        }
        
        $this->redirect('home');
    }
}
