<?php

namespace core;

class Controller
{
    protected $view;
    protected $instance;
    protected $connect;

    public function __construct()
    {
        $this->view = new View('../views/');
        $this->instance = Db::getInstance();
        $this->connect = $this->instance->getConnect();
    }
}