<?php

namespace core;

class View
{
    public $viewPath;
    public $layout;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function render($viewName, $vars = [], $code = 200)
    {
        http_response_code($code);
        extract($vars);

        require_once $this->viewPath . $viewName . '.php';
    }
}