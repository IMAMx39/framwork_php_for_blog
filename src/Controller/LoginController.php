<?php

namespace App\Controller;

use App\repository\UserRepository;
use Core\Controller;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;
use Core\Session;

class LoginController extends Controller
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(Request $request): Response
    {
        $formLogin = new FormBuilder('POST', '/login');

        $formLogin
            ->add((new Input('email', ['id' => 'email', 'class' => 'form-control']))
                ->withLabel('Email')
            )->add(
                (new Password('password', ['id' => 'password', 'class' => 'md-4 form-control']))
                    ->withLabel('Mot de passe')
            );

        if ($formLogin->handleRequest($request)->isSubmitted() && $formLogin->isValid()) {

            $email = Request::getData('email');
            $password = Request::getData('password');

            $this->loginUser($email, $password);
        }

        return $this->render('login', [
            "form" => $formLogin
        ]);
    }

    private function loginUser(string $email, string $password)
    {
        $user = $this->userRepository->getUserLogin($email, $password);

        Session::setUser($user);

        header('location: /');
        exit();
    }

}