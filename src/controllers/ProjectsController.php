<?php

require_once __DIR__ . '/../utils/database.php';

dump($_POST);

$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;

$pdo = getConnection();
if(!empty($title)) {
    $sql = "INSERT INTO `Project` (`id`, `description`, `title`, `user_id`) VALUES (NULL,'$description', '$title', NULL);";
    $pdoStatement = $pdo->prepare($sql);
    $result = $pdoStatement->execute();
}

$sql = "SELECT * FROM `Project`;";
$pdoStatement = $pdo->prepare($sql);
$result = $pdoStatement->execute();
$projects = $pdoStatement->fetchAll();
$projects = array_chunk($projects, 3);

include __DIR__ .'/../views/home.php';