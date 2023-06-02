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
}