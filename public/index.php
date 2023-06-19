<?php


use App\Controller\AuthController;
use App\Controller\SiteController;
use Core\Application;
use Core\Request;

require '../vendor/autoload.php';


$app = new Application();

$app->getRouter()->get('/home', static function (Request $request) {
    return (new SiteController())->home($request);
});

$app->getRouter()->get('/', static function (Request $request) {
    return (new SiteController())->home($request);
});

$app->getRouter()->get('/contact', static function (Request $request) {
    return (new SiteController())->contact($request);
});

$app->getRouter()->get('/login', static function (Request $request) {
    return (new AuthController())->login($request);
});

$app->getRouter()->get('/login', static function (Request $request) {
    return (new AuthController())->login($request);
});

$app->getRouter()->get('/register', static function (Request $request ) {
    return (new AuthController())->handleRegister($request);
});
$app->getRouter()->get('/users', static function (Request $request) {
    return (new AuthController())->users($request);
});

$app->getRouter()->post('/register', static function (Request $request) {
    return (new AuthController())->handleRegister($request);
});


$response = $app->request(new Request());
http_response_code($response->getStatus());
echo $response->getContent($response);
exit();

