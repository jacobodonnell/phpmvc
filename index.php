<?php

function dump($var): void
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

$config = require_once "./config.php";
$dsn = $config['dsn'];

$pdo = new PDO($dsn, $config['dbUser'], $config['dbPassword'], [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->query("SELECT * FROM product");

$product = $stmt->fetchAll(PDO::FETCH_ASSOC);


dump($product);