<?php

namespace models;

use core\ActiveRecord;

class User extends ActiveRecord
{
    protected int $id;
    protected string $name;
    protected int $age;

    public static function getTableName(): string
    {
        return 'user';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}