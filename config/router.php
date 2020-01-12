<?php

use Polzagram\Action\IndexAction;
use Polzagram\Action\RegisterAction;
use Polzagram\Action\UserGetAction;
use Polzagram\Action\UsersAction;
use Polzagram\Action\TestAction;

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('index', '/', IndexAction::class);
$router->get('user.get', '/users/{id}', UserGetAction::class);
$router->get('users', '/users', UsersAction::class);
$router->route('register', '/register', RegisterAction::class);
$router->route('test', '/test', TestAction::class);