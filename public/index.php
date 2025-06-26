<?php

define('BASE_PATH', dirname(__DIR__));

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$segments = explode('/', $path);

$action = $segments[2];
$controller = $segments[1];

require BASE_PATH . "/src/controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();