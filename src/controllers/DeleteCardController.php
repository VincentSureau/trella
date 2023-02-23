<?php

namespace App\Trello\controllers;


use App\Trello\controllers\AbstractController;
use App\Trello\models\CardModel;


    class DeleteCardController extends AbstractController
    {
        public function index()
        {
            $cardModel = new CardModel();
            
            $project_id = $_GET['projectId'];
            $list_id = $_GET['listId'];
            $card_id = $_GET['cardId'];

            if(!empty($card_id) && !empty($list_id)) {
                $cardModel->delete($list_id, $card_id);
            }
            
           $this->redirect('?page=board&id='.$project_id);
        }
    }



