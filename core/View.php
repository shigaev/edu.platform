<?php

namespace core;

class View
{
    public $viewPath;
    public $layout;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath;
        $this->layout = (require_once '../config/settings.php')['layout'];
    }

    public function render($viewName, $vars = [], $code = 200)
    {
        http_response_code($code);
        extract($vars);

        ob_start();
        require_once $this->viewPath . $viewName . '.php';
        $content = ob_get_contents();
        ob_clean();
        require_once "../views/layout/{$this->layout}.php";
    }
}