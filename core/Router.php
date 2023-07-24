<?php

namespace core;

use exceptions\NotFoundException;

class Router extends Controller
{
    public $current_rout;
    public $match = false;

    public array $routes;

    public function route($prefix = '')
    {
        foreach ($this->routes[0] as $key => $route) {
            /*if ($this->currentRoute() === '') {
                preg_match('~^' . $key . '$~', $this->currentRoute(), $matches);
            } else {
                preg_match('~^' . $key . $prefix . '$~', $this->currentRoute(), $matches);
            }

            if (!empty($matches)) {
                $this->match = true;
                break;
            }*/

            preg_match('~^' . $key . '$~', $this->currentRoute(), $matches);

            if (!empty($matches)) {
                $this->match = true;
                break;
            }
        }

//        var_dump($matches);
//        var_dump($this->match);

        if (!$this->match) {
            throw new NotFoundException();
//            $this->view->render('error/not-found', [], 404, 'error');
//            return;
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

    public static function showCurrent()
    {
        return (new Router)->currentRoute();
    }
}