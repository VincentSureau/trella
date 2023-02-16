<?php

function getConnection()
{
    $config = parse_ini_file(__DIR__ . '/../../config.ini');

    if(!$config) {
        throw new \Exception("Le fichier config.ini est manquant. Copier le fichier config.dist.ini et indiquez vos informations de connexion.");
    }

    $db_host = $config['DB_HOST'];
    $db_username = $config['DB_USERNAME'];
    $db_password = $config['DB_PASSWORD'];
    $db_name = $config['DB_NAME'];

    try {
        $dbh = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }

    return $dbh;
}