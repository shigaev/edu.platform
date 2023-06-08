<?php

namespace controllers;

use core\Controller;
use models\About;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page';
        $this->view->render('main/index', ['title' => $title]);
    }

    public function error()
    {
        $title = 'ERROR 404. Page not found';
        $this->view->render('main/error', ['title' => $title], 404, 'error');
    }
}