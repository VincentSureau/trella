<?php
namespace App\Trello\models;

use App\Trello\utils\Database;

class ListModel
{
    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;

    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        $this->pdo = Database::getConnection();
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
