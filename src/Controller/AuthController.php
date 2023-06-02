<?php

namespace App\Controller;

use App\Model\RegisterModel;
use Core\Controller;
use Core\Request;
use Core\Response;

class AuthController extends Controller
{
    public function login() : Response
    {
        return $this->render('login',[]);
    }

    public function register(Request $request) : Response
    {
        $registerModel = new RegisterModel();

        if ($request->isPOST()){
            $registerModel->loadData($request->query());
            if ($registerModel->validate() && $registerModel->register()){
                return 'Sucess';
            }
            var_dump($registerModel->errors);
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }

        return $this->render('register', [
            'model' => $registerModel
        ]);
    }

}