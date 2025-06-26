<?php

define('BASE_PATH', dirname(__DIR__));

$path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

spl_autoload_register(function (string $class_name) {
    require BASE_PATH . '/src/' . str_replace('\\', '/', $class_name) . '.php';
});

$router = new Framework\Router;

$router->add('/home/index', ['controller' => 'home', 'action' => 'index']);
$router->add('/products', ['controller' => 'products', 'action' => 'index']);
$router->add('/', ['controller' => 'home', 'action' => 'index']);

$params = $router->match($path);

if ($params === false) {
    exit('No route matched');
}

$action = $params['action'];
$controller = 'App\Controllers\\' . ucwords($params['controller']);

//require BASE_PATH . "/src/Controllers/$controller.php";

$controller_object = new $controller;

$controller_object->$action();