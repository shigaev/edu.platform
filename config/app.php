<?php

//$routes = [
//    '~^$~' => [\controllers\MainController::class, 'index'],
//    '~^about$~' => [\controllers\AboutController::class, 'index'],
//    '~^about/news$~' => [\controllers\AboutController::class, 'news'],
//];

//$routes = [
//    '' => 'index',
//    'about' => 'index',
//    'about/news' => 'news'
//];

$routes = new \core\Routs([
    'about' => 'index',
    'about/news' => 'news',
    'category' => 'category'
]);