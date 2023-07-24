<?php

use services\UserAuthService;

require_once '../core/Autoloader.php';

try {
    require_once '../config/routes.php';
} catch (\exceptions\DbException $e) {
    $view = new \core\View('../views/');
    $view->render('error/db-error', ['error' => $e->getMessage(), 'title' => $e->getMessage()]);
} catch (\exceptions\UnauthorizedException $e) {
    $view = new \core\View('../views/');
    $view->render('error/401', ['error' => $e->getMessage(), 'title' => 'Вы не авторизованы'], 401);
} catch (\exceptions\Forbidden $e) {
    $user = UserAuthService::getUserByToken();
    $view = new \core\View('../views/');
    $view->render('error/403', ['error' => $e->getMessage(), 'title' => 'Недостаточно прав', 'user' => $user], 403);
} catch (\exceptions\NotFoundException $e) {
    $view = new \core\View('../views/');
    $view->render('error/not-found', ['error' => $e->getMessage(), 'title' => 'Not found'], 404, 'error');
}