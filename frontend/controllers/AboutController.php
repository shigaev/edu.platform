<?php

namespace frontend\controllers;

use core\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About page | FRONTEND';
        $this->view->render('about/index', ['title' => $title]);
    }

    public function news()
    {
        $title = 'News about page | FRONTEND';
        $this->view->render('about/news', ['title' => $title]);
    }
}