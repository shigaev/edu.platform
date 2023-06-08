<?php

namespace core;

use Cassandra\Set;

class View
{
    public $viewPath;
    public $layout;

    public function __construct($viewPath)
    {
        $init = Settings::init();
        $this->viewPath = $viewPath;
        $this->layout = $init->layout;
    }

    public function render($viewName, $vars = [], $code = 200, $layout = '')
    {
        http_response_code($code);
        extract($vars);

        ob_start();
        require_once $this->viewPath . $viewName . '.php';
        $content = ob_get_contents();
        ob_clean();

        if (!empty($layout)) {
            require_once "../views/layout/{$layout}.php";
        } else {
            require_once "../views/layout/{$this->layout}.php";
        }
    }
}