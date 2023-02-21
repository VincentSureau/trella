<?php

namespace App\Trello\models;

use PDO;
use App\Trello\utils\Database;

class ProjectModel
{
    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;
    
    private $id;
    private $title;
    private $description;

    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create($title, $description = null)
    {
        $sql = "INSERT INTO `Project` (`id`, `description`, `title`, `user_id`) VALUES (NULL, :description, :title, NULL);";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $pdoStatement->bindParam(':description', $description, PDO::PARAM_STR);
        $result = $pdoStatement->execute();
        return $result;
    }
    
    public function findAll()
    {
        $sql = "SELECT * FROM `Project`;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $projects = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $projects;
    }
    
    public function find($id)
    {
        $sql = "SELECT * FROM `Project` WHERE `id` = :id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $project = $pdoStatement->fetchObject(self::class);
        return $project;
    }

    public function delete($project_id)
    {
        $sql = "DELETE FROM `Project` WHERE `id` = :project_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
