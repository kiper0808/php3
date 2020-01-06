<?php
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
require_once '../config/dotenv.php';
require_once '../config/database.php';
require_once '../config/view.php';
require_once '../config/router.php';

$serverRequest = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
$matcher = $routerContainer->getMatcher();

if($action = $matcher->match($serverRequest)) {
    foreach ($action->attributes as $name => $attribute){
        $serverRequest = $serverRequest->withAttribute($name, $attribute);
    }

    $action = new $action->handler;

    $response = new \GuzzleHttp\Psr7\Response();
    $response->getBody()->write(call_user_func($action, $serverRequest));

    echo $response->getBody();
}