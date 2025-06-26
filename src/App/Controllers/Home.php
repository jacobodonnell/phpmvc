<?php

namespace App\Controllers;

class Home
{
    public function index()
    {
        require BASE_PATH . '/views/home_index.php';
    }
}