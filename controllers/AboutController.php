<?php

namespace controllers;

use core\Controller;
use core\Settings;
use models\About;

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About page';
        $this->view->render('about/index', ['title' => $title]);
    }

    public function news()
    {
        $title = 'News about page';
        $this->view->render('about/news', ['title' => $title]);
    }
}