<?php


use App\Controller\Admin\AdminController;
use App\Controller\AuthController;
use App\Controller\ContactController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\LogoutController;
use App\Controller\PostController;
use App\Controller\PostsListController;
use Core\Application;
use Core\Request;

require '../vendor/autoload.php';

$app = new Application();

$app->getRouter()->get('/^\/$/', static function (Request $request) {
    return (new HomeController())->contact($request);
});
$app->getRouter()->any('/^\/articles\/([0-9]+)$/', static function (Request $request, array $args) {
    return (new PostController())->index($request, $args );
});

$app->getRouter()->any('/^\/contact$/', static function (Request $request) {
    return (new ContactController())->contact($request);
});

$app->getRouter()->any('/^\/home$/', static function (Request $request) {
    return (new HomeController())->contact($request);
});

$app->getRouter()->any('/^\/postList$/', static function (Request $request) {
    return (new PostsListController())->index($request);
});


$app->getRouter()->any('/^\/login$/', static function (Request $request) {
    return (new LoginController())->login($request);
});

$app->getRouter()->any('/^\/admin$/', static function (Request $request,array $action) {
    return (new AdminController())->index($request, $action);
});

$app->getRouter()->any('/^\/admin\/([a-z]+)$/', static function (Request $request,array  $action) {
    return (new AdminController())->admin($request,$action);
});
$app->getRouter()->any('/^\/admin\/([a-z]+)$/', static function (Request $request,array  $action) {
    return (new AdminController())->createPost($request,$action);
});

$app->getRouter()->any('/^\/users$/', static function (Request $request) {
    return (new AdminController())->displayUsers($request);
});

//$app->getRouter()->any('/^\/posts$/', static function (Request $request) {
//    return (new AdminController())->adminPost($request);
//});



$app->getRouter()->get('/^\/logout$/', static function (Request $request) {
    return (new LogoutController())->logout($request);
});

$app->getRouter()->any('/^\/register$/', static function (Request $request) {
    return (new AuthController())->handleRegister($request);
});



define('ROOT', dirname(__DIR__));

$response = $app->request(new Request());


http_response_code($response->getStatus());
echo $response->getContent();
exit();

