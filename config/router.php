<?php

use Polzagram\Action\IndexAction;
use Polzagram\Action\UserGetAction;

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('index', '/', IndexAction::class);
$router->get('user.get', '/users/{id}', UserGetAction::class);