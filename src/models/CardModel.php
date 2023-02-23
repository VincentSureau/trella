<?php

namespace App\Trello\models;

use PDO;
use App\Trello\utils\Database;


class CardModel
{

    // Propriété qui stocke la connexion PDO à la base de données
    public $pdo;

    private $id;
    private $title;
    private $list_id;

    // Constructeur de la classe qui initialise la connexion à la base de données en appelant la fonction getConnection() définie dans le fichier database.php
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create(string $title, int $list_id): bool
    {
        $sql = "INSERT INTO `Card` (`id`, `title`, `list_id`) VALUES (NULL, :title, :list_id);";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
        $pdoStatement->bindParam(':title', $title, PDO::PARAM_STR);
        $result = $pdoStatement->execute();
        return $result;
    }

    public function findByList($list_id)
    {
        $sql = "SELECT * FROM `Card` WHERE `list_id` = :list_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
        $result = $pdoStatement->execute();
        $cards = $pdoStatement->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $cards;
    }

    public function delete($list_id, $card_id)
    {
        $sql = "DELETE FROM `Card` WHERE `list_id` = :list_id AND `id` = :card_id;";
        $pdoStatement = $this->pdo->prepare($sql);
        $pdoStatement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
        $pdoStatement->bindParam(':card_id', $card_id, PDO::PARAM_INT);
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
     * Get the value of list_id
     */ 
    public function getList_id()
    {
        return $this->list_id;
    }

    /**
     * Set the value of list_id
     *
     * @return  self
     */ 
    public function setList_id($list_id)
    {
        $this->list_id = $list_id;

        return $this;
    }
}

