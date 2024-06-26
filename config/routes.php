<?php

$routes = new \core\Router();
$routes->getRoutes([
    '' => ['Main', 'index'],
    'about' => ['About', 'index'],
    'about/news' => ['About', 'news'],
    'articles' => ['Article', 'index'],
    'articles/(\d+)' => ['Article', 'view'],
    'articles/(\d+)/edit' => ['Article', 'edit'],
    'articles/(\d+)/delete' => ['Article', 'delete'],
    'articles/add' => ['Article', 'add'],
    'users/register' => ['User', 'signUp'],
    'users/login' => ['User', 'signIn'],
    'users/logout' => ['User', 'logout'],
//    '.*' => ['Error', 'notFound']
]);
$routes->route();