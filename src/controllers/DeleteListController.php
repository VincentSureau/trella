<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class DeleteListController extends AbstractController
{
    public function index()
    {
        $listModel = new ListModel();
        
        $project_id = $_GET['projectId'];
        $list_id = $_GET['listId'];
        
        if(!empty($project_id) && !empty($list_id)) {
            $listModel->delete($list_id, $project_id);
        }
        
        header('Location: ?page=board&id='.$project_id);
        exit();
    }
}
