<?php

namespace backend\controllers;

use core\Controller;
use exceptions\UnauthorizedException;

class MainController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->user == null) {
            header("Location: http://edu.platform.admin/users/login", '', 302);
            exit();
        }
    }
}