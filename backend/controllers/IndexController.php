<?php

namespace backend\controllers;

use core\Controller;

class IndexController extends MainController
{
    public function index()
    {
        $title = 'Main page | BACKEND';

        $mainPage = $this->instance->query('SELECT * FROM `main_page`');

        $this->view->render('main/index', ['title' => $title, 'main' => $mainPage]);
    }
}