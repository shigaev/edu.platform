<?php

namespace controllers;

use core\Controller;
use core\Db;
use models\About;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page';

        $mainPage = $this->instance->query('SELECT * FROM `main_page`');

        $this->view->render('main/index', ['title' => $title, 'main' => $mainPage]);
    }

    public function error()
    {
        $title = 'ERROR 404. Page not found';
        $this->view->render('main/error', ['title' => $title], 404, 'error');
    }
}