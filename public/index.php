<?php

define('BASE_PATH', dirname(__DIR__));

$path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require BASE_PATH . '/src/router.php';

$router = new Router;

$router->add('/home/index', ['controller' => 'home', 'action' => 'index']);
$router->add('/products', ['controller' => 'products', 'action' => 'index']);
$router->add('/', ['controller' => 'home', 'action' => 'index']);

$params = $router->match($path);

if ($params === false) {
    exit('No route matched');
}

$controller = $params['controller'];
$action = $params['action'];

require BASE_PATH . "/src/controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();