<?php

namespace controllers;

use core\Controller;
use models\About;

class MainController extends Controller
{
    public function index()
    {
        $this->view->render('main/index');
    }
}