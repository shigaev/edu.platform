<?php

use core\View;
use exceptions\DbException;
use exceptions\Forbidden;
use exceptions\NotFoundException;
use exceptions\UnauthorizedException;
use services\UserAuthService;

require_once '../../core/Autoloader.php';

try {
    require_once '../config/routes.php';
} catch (DbException $e) {
    $view = new View('../views/');
    $view->render('error/db-error', ['error' => $e->getMessage(), 'title' => $e->getMessage()]);
} catch (UnauthorizedException $e) {
    $view = new View('../views/');
    $view->render('error/401', ['error' => $e->getMessage(), 'title' => 'Вы не авторизованы'], 401);
} catch (Forbidden $e) {
    $user = UserAuthService::getUserByToken();
    $view = new View('../views/');
    $view->render('error/403', ['error' => $e->getMessage(), 'title' => 'Недостаточно прав', 'user' => $user], 403);
} catch (NotFoundException $e) {
    $view = new View('../views/');
    $view->render('error/not-found', ['error' => $e->getMessage(), 'title' => 'Not found'], 404, 'error');
}