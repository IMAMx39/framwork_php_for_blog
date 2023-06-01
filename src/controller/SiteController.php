<?php

namespace App\controller;

use Core\Application;
use Core\Controller;
use Core\Request;

class SiteController extends Controller
{

    public function home(): string
    {
        $params = [
            'name' =>'toto',
        ];
        return Application::$app->router->renderView('home',$params);
    }
    public function contact(): string
    {
        return $this->render('contact');
    }

    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
        var_dump($body);
        return '';
    }

}