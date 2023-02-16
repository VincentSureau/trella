<?php

require_once __DIR__ . '/../utils/database.php';

function create($title)
{
    $pdo = getConnection();
    $sql = "INSERT INTO `List` (`id`, `title`, `project_id`) VALUES (NULL, '$title', NULL);";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    return $result;
}

function findAll()
{
    $pdo = getConnection();
    $sql = "SELECT * FROM `List`;";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    $lists = $pdoStatement->fetchAll();
    return $lists;
}