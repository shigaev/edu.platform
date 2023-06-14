<?php

$routes = new \core\Router();
$routes->getRoutes([
    '' => ['Main', 'index'],
    'about' => ['About', 'index'],
    'about/news' => ['About', 'news'],
    'articles' => ['Article', 'index'],
    'articles/(\d+)' => ['Article', 'view'],
    '.*' => ['Main', 'error']
]);
$routes->route();