<?php

namespace App\controller;

use App\model\RegisterModel;
use Core\Controller;
use Core\Request;

class AuthController extends Controller
{
    public function login(): bool|array|string
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request): bool|array|string
    {
        $errors = [];
        if ($request->isPOST()){
            $registerModel = new RegisterModel();
            $registerModel->loadData($request->getBody());
            var_dump($registerModel);
            if ($registerModel->validate() && $registerModel->register()){
                return 'Sucess';
            }

            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }


}