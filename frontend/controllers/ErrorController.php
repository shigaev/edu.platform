<?php

namespace frontend\controllers;

use core\Controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        $title = 'ERROR 404. Page not found | FRONTEND';
        $this->view->render('error/not-found', ['title' => $title], 404, 'error');
    }
}