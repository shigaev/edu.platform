<?php

namespace core;

/**
 * The singleton design pattern
 */
class Settings
{
    private static $_object = null;
    protected $_settings;

    private function __construct()
    {
        $this->_settings = require __DIR__ . '/../config/settings.php';
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function init(): ?Settings
    {
        if (is_null(self::$_object)) {
            self::$_object = new Settings();
        }
        return self::$_object;
    }

    public function __set($key, $value)
    {
        $this->_settings[$key] = $value;
    }

    public function __get($key)
    {
        if (array_key_exists($key, $this->_settings)) {
            return $this->_settings[$key];
        } else {
            return null;
        }
    }
}