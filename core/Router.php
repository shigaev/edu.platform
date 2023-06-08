<?php

namespace core;

class Router extends Controller
{
    public $current_rout;
    public $match;

    public array $routes;

    public function route()
    {
        foreach ($this->routes[0] as $key => $route) {
            preg_match('~^' . $key . '$~', $this->currentRoute(), $matches);
            if (!empty($matches)) {
                $this->match = true;
                break;
            }
        }

        $controllerName = '\controllers\\' . $route[0] . 'Controller';
        $actionName = $route[1];

        $controller = new $controllerName;

        $controller->$actionName();
    }

    public function currentRoute()
    {
        return $this->current_rout = $_GET['r'] ?? '';
    }

    public function getRoutes($param): array
    {
        $this->routes = array($param);
        $this->routes[] = $param;
        return $this->routes;
    }
}