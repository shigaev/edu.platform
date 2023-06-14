<?php

namespace core;

class Router extends Controller
{
    public $current_rout;
    public $match;

    public array $routes;

    public function route($prefix = '')
    {
        foreach ($this->routes[0] as $key => $route) {

            if ($this->currentRoute() === '') {
                preg_match('~^' . $key . '$~', $this->currentRoute(), $matches);
            } else {
                preg_match('~^' . $key . $prefix . '$~', $this->currentRoute(), $matches);
            }

            if (!empty($matches)) {
                $this->match = true;
                break;
            }
        }

        unset($matches[0]);

        $controllerName = '\controllers\\' . $route[0] . 'Controller';
        $actionName = $route[1];

        $controller = new $controllerName;
        $controller->$actionName(...$matches);
    }

    public function currentRoute()
    {
        return $this->current_rout = $_GET['r'] ?? '';
    }

    public function getRoutes($param): array
    {
        $this->routes[] = $param;
        return $this->routes;
    }
}