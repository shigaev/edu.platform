<?php

namespace core;

class View
{
    public $viewPath;
    public $layout;
    public $dirSettings;

    private array $vars = [];

    public function __construct($viewPath)
    {
        $init = Settings::init();
        $this->viewPath = $viewPath;
        $this->layout = $init->layout;
        $this->dirSettings = require dirname(realpath($this->viewPath)) . '\\config\\settings.php';
    }

    public function setVars(string $name, $value): void
    {
        $this->vars[$name] = $value;
    }

    public function render($viewName, array $vars = [], $code = 200, $layout = '')
    {
        http_response_code($code);
        extract($this->vars);
        extract($vars);

        ob_start();
        require_once $this->viewPath . $viewName . '.php';
        $content = ob_get_contents();
        ob_clean();

        if (!empty($layout)) {
            $path = dirname(realpath($this->viewPath . $viewName . '.php'), 3);

            require_once $path . "/views/layout/{$layout}.php";
        } else {
            $path = dirname(realpath($this->viewPath . $viewName . '.php'), 3);

            require_once $path . "/views/layout/{$this->dirSettings['layout']}.php";
        }
    }
}