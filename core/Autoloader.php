<?php

namespace core;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class_name) {
            require_once '../' . $class_name . '.php';
        });
    }
}

Autoloader::register();