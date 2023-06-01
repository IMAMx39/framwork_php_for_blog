<?php


use App\controller\AuthController;
use App\controller\SiteController;
use Core\Application;

require '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class,'home']);

$app->router->get('/login', 'login');
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/login', [AuthController::class, 'login']);

$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/register', [AuthController::class, 'register']);


//$app->response->statusCode();

$app->run();

