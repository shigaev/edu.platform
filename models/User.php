<?php

namespace models;

use core\ActiveRecord;
use exceptions\InvalidArgument;

class User extends ActiveRecord
{
    protected $id;
    protected string $username;

    protected string $nickname;

    protected string $email;

    protected bool $is_confirmed;

    protected string $role;

    protected $password_hash;

    protected $auth_token;

    public static function getTableName(): string
    {
        return 'user';
    }

    public function setUserName($name)
    {
        $this->name = $name;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function setNickName($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getNickName(): string
    {
        return $this->nickname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @throws InvalidArgument
     */
    public static function signUp(array $userData): User
    {
        if (empty($userData['username'])) {
            throw new InvalidArgument('Не заполнено поле Username');
        }

        if (empty($userData['nickname'])) {
            throw new InvalidArgument('Не заполнено поле Nickname');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgument('Nickname может состоять только из символов латинского алфавита и цифр');
        }

        if (static::findOneColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgument('Пользователь с таким Nickname уже существует');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgument('Не заполнено поле Email');
        }

        if (static::findOneColumn('email', $userData['email']) !== null) {
            throw new InvalidArgument('Пользователь с таким Email уже существует');
        }

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgument('Email некорректный');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgument('Не заполнено поле Password');
        }

        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgument('Пароль должен содержать не менее 8 символов');
        }

        $user = new User();
        $user->username = $userData['username'];
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->is_confirmed = false;
        $user->role = 'user';
        $user->password_hash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->auth_token = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }
}