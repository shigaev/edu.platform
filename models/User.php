<?php

namespace models;

use core\ActiveRecord;
use exceptions\InvalidArgument;

class User extends ActiveRecord
{
    protected $id;
    protected string $username;
    protected int $age;

    public static function getTableName(): string
    {
        return 'user';
    }

    public function getName(): string
    {
        return $this->username;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @throws InvalidArgument
     */
    public static function signUp(array $userData): void
    {
        if (empty($userData['username'])) {
            throw new InvalidArgument('Не заполнено поле Username');
        }

        if (empty($userData['nickname'])) {
            throw new InvalidArgument('Не заполнено поле Nickname');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgument('Не заполнено поле Email');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgument('Не заполнено поле Password');
        }
    }
}