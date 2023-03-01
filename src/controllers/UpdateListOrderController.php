<?php

namespace App\Trello\controllers;

use App\Trello\models\ListModel;
use App\Trello\models\ProjectModel;
use App\Trello\controllers\AbstractController;

class UpdateListOrderController extends AbstractController
{
    public function index() : void
    {
        $listModel = new ListModel();
        
        $order = $_POST['order'] ?? null;
        $list_id = $_POST['list_id'] ?? null;

        if(!empty($list_id) && !empty($order)) {
            $result = $listModel->updateOrder($list_id, $order);
            $this->sendJson([
                'message' => 'update successfull'
            ]);
        }
        
        $this->sendJson([
            'message' => 'invalid order or list_id'
        ]);
    }
}
