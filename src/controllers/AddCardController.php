<?php
namespace App\Trello\controllers;


use App\Trello\models\CardModel;
use App\Trello\controllers\AbstractController;

class AddCardController extends AbstractController
{
    public function index(): void
    {

        $cardModel = new CardModel();
        $title = $_POST['title'];
    
        // $project_id = $_GET['projectId'];
        $list_id = $_POST['listId'];
        $project_id = $_POST['projectId'];

        
        if(!empty($title) && !empty($list_id))  {
            $card = $cardModel->create($title, $list_id);
        }

        $this->redirect('?page=board&id='.$project_id);
    }
}