<?php

namespace App\Controller;

use Core\Application;
use Core\Controller;
use Core\Request;
use Core\Response;

class SiteController extends Controller
{

    public function home(Request $request): Response
    {
        return $this->render('home',[]);
    }

    public function contact(Request $request): Response
    {
        return $this->render('contact',[]);
    }

}
