<?php

namespace controllers;

use core\Controller;
use models\About;

class MainController extends Controller
{
    public function index()
    {
//        $model = new About();

        require_once '../view/main/index.php';
    }
}