<?php

namespace controllers;

use core\Controller;
use models\About;

class AboutController extends Controller
{
    public function index()
    {
        $this->view->render('about/index');
    }

    public function news()
    {
        $this->view->render('about/news');
    }
}