<?php

require_once __DIR__ . '/../utils/database.php';

function create($title, $description = null)
{
    $pdo = getConnection();
    $sql = "INSERT INTO `Project` (`id`, `description`, `title`, `user_id`) VALUES (NULL,'$description', '$title', NULL);";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    return $result;
}

function findAll()
{
    $pdo = getConnection();
    $sql = "SELECT * FROM `Project`;";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    $projects = $pdoStatement->fetchAll();
    return $projects;
}

function find($id)
{
    $pdo = getConnection();
    $sql = "SELECT * FROM `Project` WHERE `id` = $id;";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
    $project = $pdoStatement->fetch();
    return $project;
}