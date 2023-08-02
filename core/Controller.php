<?php

namespace core;

//use frontend\models\User;
use common\models\User;
use services\UserAuthService;

class Controller
{
    protected View $view;
    protected ?Db $instance;

    protected ?User $user;

    public function __construct()
    {
        $this->instance = Db::getInstance();
        $this->user = UserAuthService::getUserByToken();
        $this->view = new View('../views/');
        $this->view->setVars('user', $this->user);
    }
}