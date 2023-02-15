<?php

dump($_POST);

$title = $_POST['title'];
$description = $_POST['description'];

include __DIR__ .'/../views/home.php';