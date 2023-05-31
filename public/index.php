<?php

require_once '../core/Autoloader.php';


$routes = [
    '~^$~' => [\controllers\MainController::class, 'index'],
    '~^about$~' => [\controllers\AboutController::class, 'index'],
    '~^about/news$~' => [\controllers\AboutController::class, 'news'],
];
var_dump($routes);
//
//$currentRoute = isset($_GET['r']) ? $_GET['r'] : '';
//
//$match = false;
//
//foreach ($routes as $key => $route) {
//    preg_match($key, $currentRoute, $matches);
//    if (!empty($matches)) {
//        $match = true;
//        break;
//    }
//}
//
//if (!$matches) {
//    echo 'Error: 404';
//    return;
//}
//
//$controllerName = $route[0];
//$actionName = $route[1];
//
//$controller = new $controllerName();
//$controller->$actionName();

$r = new \core\Router();
$r->getRoutes([
    '~^$~' => [\controllers\MainController::class, 'index'],
    '~^about$~' => [\controllers\AboutController::class, 'index'],
    '~^about/news$~' => [\controllers\AboutController::class, 'news'],
]);
$r->route();