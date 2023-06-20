<?php

namespace core;

abstract class ActiveRecord
{
    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        // позднее статическое связывание
        return $db->query('SELECT * FROM ' . static::getTableName() . ';',
            [],
            static::class);
    }

    public static function findOne($id): ?array
    {
        $db = Db::getInstance();
        // позднее статическое связывание
        return $db->query('SELECT * FROM ' . static::getTableName() . ' WHERE id = :id',
            [':id' => $id],
            static::class
        );
    }

    abstract protected static function getTableName(): string;
}