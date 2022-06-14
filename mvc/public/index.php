<?php

// echo "hello world";
require_once __DIR__.'../../vendor/autoload.php';
use app\core\Application;

// echo '<pre>'
// ;var_dump(dirname(__DIR__));
// echo'</pre>';
// exit;

$app = new Application(dirname(__DIR__));

// $router = new Router();
// run some request 
// when get request


$app->router->get('/','home');

$app->router->get('/contact','contact');

// $app->userRouter($router);
$app->run();