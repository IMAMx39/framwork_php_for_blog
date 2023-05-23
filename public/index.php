<?php


use Core\Application;

require '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/login', 'login');
$app->router->post('/login', function () {
    return 'Test data';
});

//$app->response->statusCode();

$app->run();

