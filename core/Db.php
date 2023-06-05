<?php

namespace core;

class Db
{
    private static $instance = null;
    protected $connect;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbName = 'edu_platform';

    private function __construct()
    {
        $this->connect = new \PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->user, $this->pass);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getConnect()
    {
        return $this->connect;
    }
}