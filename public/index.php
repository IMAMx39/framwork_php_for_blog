<?php


use App\Controller\AuthController;
use App\Controller\ContactController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\SiteController;
use Core\Application;
use Core\Request;
use Core\Session;

require '../vendor/autoload.php';
Session::start();

$app = new Application();

$app->getRouter()->get('/home', static function (Request $request) {
    return (new SiteController())->home($request);
});

$app->getRouter()->get('/', static function (Request $request) {
    return (new SiteController())->home($request);
});

$app->getRouter()->get('/contact', static function (Request $request) {
    return (new ContactController())->contact($request);
});

$app->getRouter()->post('/contact', static function (Request $request) {
    return (new ContactController())->contact($request);
});

//$app->getRouter()->get('/login', static function (Request $request) {
//    return (new AuthController())->login($request);
//});

$app->getRouter()->get('/login', static function (Request $request) {
    return (new LoginController())->login($request);
});
$app->getRouter()->post('/login', static function (Request $request) {
    return (new LoginController())->login($request);
});
//$app->getRouter()->get('/logout', static function (Request $request) {
//    return (new LogoutController())->logout($request);
//});

$app->getRouter()->get('/register', static function (Request $request ) {
    return (new AuthController())->handleRegister($request);
});
$app->getRouter()->get('/users', static function (Request $request) {
    return (new AuthController())->users($request);
});

$app->getRouter()->post('/register', static function (Request $request) {
    return (new AuthController())->handleRegister($request);
});

define('ROOT',dirname(__DIR__));

$response = $app->request(new Request());
http_response_code($response->getStatus());
echo $response->getContent($response);
exit();

