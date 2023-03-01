<?php

namespace App\Trello\controllers;

use App\Trello\models\CardModel;
use App\Trello\controllers\AbstractController;

class UpdateCardOrderController extends AbstractController
{
    public function index() : void
    {
        $cardModel = new CardModel();
        
        $order = $_POST['order'] ?? null;
        $card_id = $_POST['card_id'] ?? null;

        if(!empty($card_id) && !empty($order)) {
            $result = $cardModel->updateOrder($card_id, $order);
            $this->sendJson([
                'message' => 'update successfull'
            ]);
        }
        
        $this->sendJson([
            'message' => 'invalid order or card_id'
        ]);
    }
}
