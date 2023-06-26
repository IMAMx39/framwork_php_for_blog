<?php


use App\Controller\AuthController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use Core\Application;
use Core\Request;
use Core\Session;

require '../vendor/autoload.php';

$app = new Application();

$app->getRouter()->get('/', static function (Request $request) {
    return (new HomeController())->contact($request);
});


$app->getRouter()->any('/contact', static function (Request $request) {
    return (new ContactController())->contact($request);
});

$app->getRouter()->any('/home', static function (Request $request) {
    return (new HomeController())->contact($request);
});


$app->getRouter()->any('/login', static function (Request $request) {
    return (new LoginController())->login($request);
});

$app->getRouter()->get('/logout', static function (Request $request) {
    return (new LogoutController())->logout($request);
});

$app->getRouter()->any('/register', static function (Request $request ) {
    return (new AuthController())->handleRegister($request);
});
$app->getRouter()->get('/users', static function (Request $request) {
    return (new AuthController())->users($request);
});


define('ROOT',dirname(__DIR__));

$response = $app->request(new Request());
http_response_code($response->getStatus());
echo $response->getContent($response);
exit();

