<?php

namespace controllers;

use core\Controller;
use models\About;

class MainController extends Controller
{
    public function actionIndex()
    {
        $model = new About();

        require_once '../view/main/index.php';
    }
}