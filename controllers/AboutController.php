<?php

namespace controllers;

use core\Controller;
use models\About;

class AboutController extends Controller
{
    public function index()
    {
        require_once '../view/about/index.php';
    }

    public function news()
    {
        require_once '../view/about/news.php';
    }
}