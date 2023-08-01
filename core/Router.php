<?php

namespace core;

use exceptions\NotFoundException;

class Router extends Controller
{
    public $current_rout;
    public $match = false;

    public array $routes;

    /**
     * @throws NotFoundException
     */
    public function route($dir, $prefix = '')
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

//        var_dump($route);

        if (!$this->match) {
            throw new NotFoundException();
        }

        unset($matches[0]);

//        $controllerName = '\frontend\controllers\\' . $route[0] . 'Controller';
        $controllerName = '\\' . $dir . '\controllers\\' . $route[0] . 'Controller';
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