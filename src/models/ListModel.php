<?php

namespace App\Trello\models;

require_once __DIR__ . '/../utils/database.php';

class ListModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnection();
    }

    public function create($title, $project_id)
    {
        $sql = "INSERT INTO `List` (`id`, `title`, `project_id`) VALUES (NULL, '$title', $project_id);";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        return $result;
    }
    
    public function findAll()
    {
        $sql = "SELECT * FROM `List`;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $lists = $pdoStatement->fetchAll();
        return $lists;
    }
    
    public function findByProject($project_id)
    {
        $sql = "SELECT * FROM `List` WHERE `project_id` = $project_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $lists = $pdoStatement->fetchAll();
        return $lists;
    }
}
