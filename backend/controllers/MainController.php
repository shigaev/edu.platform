<?php

namespace backend\controllers;

use core\Controller;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page | BACKEND';

        $mainPage = $this->instance->query('SELECT * FROM `main_page`');

        $this->view->render('main/index', ['title' => $title, 'main' => $mainPage]);
    }
}