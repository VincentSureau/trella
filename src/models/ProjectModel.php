<?php

namespace App\Trello\models;

require_once __DIR__ . '/../utils/database.php';

class ProjectModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnection();
    }

    public function create($title, $description = null)
    {
        $sql = "INSERT INTO `Project` (`id`, `description`, `title`, `user_id`) VALUES (NULL,'$description', '$title', NULL);";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        return $result;
    }
    
    public function findAll()
    {
        $sql = "SELECT * FROM `Project`;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $projects = $pdoStatement->fetchAll();
        return $projects;
    }
    
    public function find($id)
    {
        $sql = "SELECT * FROM `Project` WHERE `id` = $id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $project = $pdoStatement->fetch();
        return $project;
    }
}
