<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class DeleteListController extends AbstractController
{
    public function index() : void
    {
        $listModel = new ListModel();
        
        $list_id = $this->getParam('list_id');
        
        $list = $listModel->find($list_id);

        if(!empty($list)) {
            $listModel->delete($list_id, $list->getProjectId());
        }
        
        $this->redirect('board_index',['project_id'=>$list->getProjectId()]);
    }
}
