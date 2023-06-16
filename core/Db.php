<?php

namespace core;

/**
 * The singleton design pattern
 */
class Db
{
    private static ?Db $instance = null;
    protected \PDO $connect;

    private function __construct()
    {
        $settings = Settings::init();

        $this->connect = new \PDO(
            "mysql:host={$settings->db['host']};
            dbname={$settings->db['dbName']}",
            $settings->db['user'],
            $settings->db['pass']);
        $this->connect->exec('SET NAMES UTF8');
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance(): ?Db
    {
        if (self::$instance === null) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getConnect(): \PDO
    {
        return $this->connect;
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $prepare = $this->connect->prepare($sql);
        $prepare->execute($params);

        return $prepare->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}