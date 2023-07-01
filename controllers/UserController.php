<?php

namespace controllers;

use core\Controller;
use exceptions\InvalidArgument;
use models\User;

class UserController extends Controller
{
    public function signUp()
    {
        $title = 'Регистрация пользователя';

        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgument $e) {
                $this->view->render('user/register', ['title' => $title, 'error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $this->view->render('user/registerSuccessful');
                return;
            }
        }

        $this->view->render('user/register', ['title' => $title]);
    }
}