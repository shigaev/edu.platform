<?php

namespace core;

class Controller
{
    protected $view;
    protected $instance;

    public function __construct()
    {
        $this->instance = Db::getInstance();
        $this->view = new View('../views/');
    }
}