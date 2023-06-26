<?php

namespace App\Controller;

use Core\Controller;
use Core\Request;
use Core\Response;
use Core\Session;

class LogoutController extends Controller
{

    public function logout(): Response
    {
        Session::Destroy();
         return   header('location: /');
    }


}