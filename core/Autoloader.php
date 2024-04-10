<?php

namespace core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($class_name) {
            require_once __DIR__ . '/../' . str_replace('\\', '/', $class_name) . '.php';
        }, true);
    }
}

Autoloader::register();