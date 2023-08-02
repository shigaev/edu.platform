<?php

namespace services;

use common\models\User;
use core\Router;
//use frontend\models\User;

class UserAuthService
{
    public static function createToken(User $user): void
    {
        $token = $user->getId() . ':' . $user->getAuthToken();
        setcookie('token', $token, 0, '/', '', false, true);
    }

    public static function logoutFromAccount()
    {
        setcookie("token", "", time() - 3600, '/');
        header("Location: /");
        exit;
    }

    public static function getUserByToken(): ?User
    {
        $token = $_COOKIE['token'] ?? '';

        if (empty($token)) {
            return null;
        }

        [$user_id, $auth_token] = explode(':', $token, 2);

        $user = User::findOne((int)$user_id);

        if ($user === null) {
            return null;
        }

        if ($user->getAuthToken() !== $auth_token) {
            return null;
        }

        return $user;
    }
}