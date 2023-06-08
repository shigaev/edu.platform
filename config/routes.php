<?php

$routes = new \core\Router();
$routes->getRoutes([
    '' => ['Main', 'index'],
    'about' => ['About', 'index'],
    'about/news' => ['About', 'news'],
    '.*' => ['Main', 'error']
]);
$routes->route();