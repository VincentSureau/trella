<?php
namespace App\Trello\models;

use PDO;
use App\Trello\utils\Database;

class ListModel
{
    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;

    private $id;
    private $title;
    private $project_id;

    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create($title, $project_id)
    {
        $sql = "INSERT INTO `List` (`id`, `title`, `project_id`) VALUES (NULL, :title, :project_id);";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $pdoStatement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
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
        $lists = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $lists;
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
        return ucwords(strtolower($this->title));
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
     * Get the value of project_id
     */ 
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Set the value of project_id
     *
     * @return  self
     */ 
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;

        return $this;
    }
}
