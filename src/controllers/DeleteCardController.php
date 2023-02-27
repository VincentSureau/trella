<?php

namespace App\Trello\controllers;


use App\Trello\controllers\AbstractController;
use App\Trello\models\CardModel;


    class DeleteCardController extends AbstractController
    {
        public function index(): void
        {
            $cardModel = new CardModel();
            
            $project_id = $this->getParam('project_id');
            $list_id = $this->getParam('list_id');
            $card_id = $this->getParam('card_id');

            if(!empty($card_id) && !empty($list_id)) {
                $cardModel->delete($list_id, $card_id);
            }
            
           $this->redirect('board_index',['project_id'=>$project_id]);
        }
    }



