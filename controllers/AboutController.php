<?php

namespace controllers;

use core\Controller;
use models\About;

class AboutController extends Controller
{
    public function actionIndex()
    {
        $model = new About();
    }
}