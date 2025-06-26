<?php

class Products
{
    public function index()
    {
        require BASE_PATH . '/src/models/product.php';

        $model = new Product();

        $products = $model->getData();

        require BASE_PATH . '/views/products_index.php';
    }

    public function show()
    {
        require BASE_PATH . '/views/products_show.php';
    }
}