<?php

require_once __DIR__ . '/../utils/database.php';

function createList($title, $project_id)
{
    $pdo = getConnection();
    $sql = "INSERT INTO `List` (`id`, `title`, `project_id`) VALUES (NULL, '$title', $project_id);";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    return $result;
}

function findAllList()
{
    $pdo = getConnection();
    $sql = "SELECT * FROM `List`;";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    $lists = $pdoStatement->fetchAll();
    return $lists;
}

function findByProject($project_id)
{
    $pdo = getConnection();
    $sql = "SELECT * FROM `List` WHERE `project_id` = $project_id;";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    $lists = $pdoStatement->fetchAll();
    return $lists;
}