<?php

namespace App\Trello\utils;

use PDO;
use PDOException;

class Database
{
    private $pdo = null;
    private static $_instance;

    public function getConfig()
    {
        $config = parse_ini_file(__DIR__ . '/../../config.ini');
    
        if(!$config) {
            throw new \Exception("Le fichier config.ini est manquant. Copier le fichier config.dist.ini et indiquez vos informations de connexion.");
        }
    
        $db_host = $config['DB_HOST'];
        $db_username = $config['DB_USERNAME'];
        $db_password = $config['DB_PASSWORD'];
        $db_name = $config['DB_NAME'];

        return compact('db_host', 'db_username', 'db_password', 'db_name');
    }

    public function __construct()
    {
        $config = $this->getConfig();

        extract($config);
    
        try {
            $dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
    
        $this->pdo = $dbh;
    }

    // on va plus faire $database = new Database();
    // $pdo = $database->getConnection();
    // Database::getConnection();
    public static function getConnection()
    {
        if(self::$_instance === null)
        {
            self::$_instance = new Database();
        }
        return self::$_instance->pdo;
    }


}
