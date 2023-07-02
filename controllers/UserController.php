<?php

namespace controllers;

use core\Controller;
use exceptions\InvalidArgument;
use models\User;
use services\UserAuthService;

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

    public function signIn()
    {
        $title = 'Авторизация пользователя';

        if (!empty($_POST)) {
            try {
                $user = User::signIn($_POST);
                UserAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgument $e) {
                $this->view->render('user/login', ['error' => $e->getMessage(), 'title' => $title]);
                return;
            }
        }

        $this->view->render('user/login', ['title' => $title]);
    }
}