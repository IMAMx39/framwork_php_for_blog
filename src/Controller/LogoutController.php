<?php

namespace App\Controller;

use Core\Controller;
use Core\Response;
use Core\Session;

class LogoutController extends Controller
{
    public function __invoke() :void
    {
        Session::Destroy();
        header('location: /');
    }

    public function logout(): void
    {
        Session::Destroy();
        header('location: /');
    }


}