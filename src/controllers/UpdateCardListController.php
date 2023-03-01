<?php

namespace App\Trello\controllers;

use App\Trello\models\CardModel;
use App\Trello\controllers\AbstractController;

class UpdateCardListController extends AbstractController
{
    public function index() : void
    {
        $cardModel = new CardModel();
        
        $list_id = $_POST['list_id'] ?? null;
        $card_id = $_POST['card_id'] ?? null;

        if(!empty($card_id) && !empty($list_id)) {
            $result = $cardModel->updateList($card_id, $list_id);
            $this->sendJson([
                'message' => 'update successfull'
            ]);
        }
        
        $this->sendJson([
            'message' => 'invalid list_id or card_id'
        ]);
    }
}
