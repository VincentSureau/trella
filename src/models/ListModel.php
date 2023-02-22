<?php
namespace App\Trello\models;

use PDO;
use App\Trello\utils\Database;
use App\Trello\models\CardModel;

class ListModel
{
    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;

    private $id;
    private $title;
    private $project_id;
    private $cards = null;

    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create($title, $project_id) : bool
    {
        $sql = "INSERT INTO `List` (`id`, `title`, `project_id`) VALUES (NULL, :title, :project_id);";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $pdoStatement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        return $result;
    }
    
    public function findAll() : array
    {
        $sql = "SELECT * FROM `List`;";
        $pdoStatement = $this->pdo->prepare($sql);
        $result = $pdoStatement->execute();
        $lists = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $lists;
    }
    
    public function findByProject($project_id) : array
    {
        $sql = "SELECT * FROM `List` WHERE `project_id` = :project_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $lists = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $lists;
    }

    
    public function delete($list_id, $project_id) : bool
    {
        $sql = "DELETE FROM `List` WHERE `project_id` = :project_id AND `id` = :list_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':project_id', $project_id, PDO::PARAM_INT);
        $pdoStatement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle() : string
    {
        return ucwords(strtolower($this->title));
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of project_id
     */ 
    public function getProjectId() : int
    {
        return $this->project_id;
    }

    /**
     * Set the value of project_id
     *
     * @return  self
     */ 
    public function setProjectId(int $project_id) : self
    {
        $this->project_id = $project_id;

        return $this;
    }

    /**
     * Get the value of cards
     */ 
    public function getCards()
    {
        if($this->cards === null) {
            // je les récupère dans la base de données
            $cardModel = new cardModel();
            $this->cards = $cardModel->findByList($this->id);
        }

        return $this->cards;
    }

    /**
     * Set the value of cards
     *
     * @return  self
     */ 
    public function setCards($cards)
    {
        $this->cards = $cards;

        return $this;
    }
}
