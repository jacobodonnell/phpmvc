<?php

class Product
{
    public function getData(): array
    {
        $config = require BASE_PATH . '/config.php';
        $dsn = $config['dsn'];

        $pdo = new PDO($dsn, $config['dbUser'], $config['dbPassword'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query('SELECT * FROM product');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}