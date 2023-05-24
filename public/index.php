<?php


use App\controller\SiteController;
use Core\Application;

require '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');

$app->router->get('/login', 'login');
//$app->router->get('/contact', 'contact');
$app->router->get('/contact', [SiteController::class, 'index']);
$app->router->post('/contact', function () {
    return 'Test data contact';
});

//$app->response->statusCode();

$app->run();

