<?php
require_once "vendor/autoload.php";

use App\Trello\Application;

$application = new Application();
$application->run();