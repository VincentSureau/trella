<?php
namespace App\Trello\utils;

// J'ai implémenté un singleton dans notre code pour effectuer la connexion à la base de données MySQL.

//Définition de la classe getConnection
class database
{
    // Je déclare une variable statique $instance qui contiendra l'unique instance de la connexion à la base de données
    private static $instance = null;

    // Je déclare une variable $pdo qui contiendra l'objet PDO correspondant à la connexion établie
    public $pdo;

    // Le constructeur est privé pour empêcher l'instanciation directe de la classe en dehors de la méthode getInstance()
    private function __construct()
    {
        // Je récupère les paramètres de connexion depuis le fichier de configuration "config.ini"
    $config = parse_ini_file(__DIR__ . '/../../config.ini');

        function getConnection()
        {
            // Si la récupération échoue, je lance une exception
            if(!$config) {
                throw new \Exception("Le fichier config.ini est manquant. Copier le fichier config.dist.ini et indiquez vos informations de connexion.");
            }

            // Je récupère les différents paramètres de connexion à la base de données depuis le fichier de configuration
            $db_host = $config['DB_HOST'];
            $db_username = $config['DB_USERNAME'];
            $db_password = $config['DB_PASSWORD'];
            $db_name = $config['DB_NAME'];

        // J'établis une connexion à la base de données en utilisant les paramètres récupérés depuis le fichier de configuration
            try {
                $this->pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
                $this->pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Si la connexion échoue, j'affiche un message d'erreur
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        }
    }

    // Je déclare une méthode statique qui permet de récupérer l'unique instance de la connexion à la base de données 
	public static function getInstance()
    {
        // Si l'instance n'a pas encore été créée, on la crée
        if (self::$instance === null) {
            self::$instance = new database;
        }

	// Je vérifie que l'objet PDO est bien défini
        if (!isset(self::$instance->pdo)) {
            throw new \Exception("Impossible d'établir la connexion à la base de données.");
        }

        // Je retourne l'objet PDO correspondant à la connexion établie
        return self::$instance;
    }
}

