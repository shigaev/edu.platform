<?php

namespace frontend\controllers;

use core\Controller;
use core\Db;
use models\About;
use models\User;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page | 123 FRONTEND';

        $this->view->render('main/index', ['title' => $title]);
    }
}