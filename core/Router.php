<?php

namespace core;

class Router
{
    public $current_rout;
    public $match;

//    $routes = [
//        '~^$~' => [\controllers\MainController::class, 'index'],
//        '~^about$~' => [\controllers\AboutController::class, 'index'],
//        '~^about/news$~' => [\controllers\AboutController::class, 'news'],
//    ];
    public $routes;

    public function route()
    {
        var_dump($this->routes);
//        foreach ($this->routes as $key => $route) {
//            preg_match($key, $this->currentRoute(), $matches);
//            if (!empty($matches)) {
//                $this->match = true;
//                break;
//            }
//        }
    }

    public function currentRoute()
    {
        return $this->current_rout = isset($_GET['r']) ? $_GET['r'] : '';
    }

    public function getRoutes($param)
    {
        return $this->routes = array($param);
    }
}