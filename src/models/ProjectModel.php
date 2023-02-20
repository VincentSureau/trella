<?php
namespace App\Trello\models;

require_once __DIR__ . '/../utils/database.php';

use App\Trello\utils\database;

class ProjectModel
{
    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;
    
    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        // Je récupére l'instance PDO créée par la fonction getConnection()
        $this->pdo = database::getInstance();
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
