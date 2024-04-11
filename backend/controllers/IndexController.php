<?php

namespace backend\controllers;

use core\Controller;

class IndexController extends MainController
{
    public function index()
    {
        $title = 'Main page | BACKEND';

        $this->view->render('main/index', ['title' => $title]);
    }
}