<?php

namespace App\Controller;

use App\repository\UserRepository;
use Core\Controller;
use Core\Form\Field\Email;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;

class AuthController extends Controller
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }


    public function login(): Response
    {
        return $this->render('login', []);
    }

    public function handleRegister(Request $request): Response
    {

        $formBuilder = new FormBuilder();

        $formBuilder
            ->add(
                (new Input('firstname', ['id' => 'firstname', 'class' => 'form-control']))
                    ->withLabel('Prénom')
            )->add(
                (new Input('lastname', ['id' => 'lastname', 'class' => 'form-control']))
                    ->withLabel('Nom')
            )->add(
                (new Email('email', ['id' => 'email', 'class' => 'form-control']))
                    ->withLabel('Email')
            )->add(
                (new Password('password', ['id' => 'password', 'class' => 'md-4 form-control']))
                    ->withLabel('Mot de passe')
            );
//            ->add(
//                (new Text('firstname'))
//                    ->attr(['class' => 'toto'])
//                    ->constraints([
//                        new NotNull(),
//                        (new StringLength())->min(3),
//                    ])
//            );
//


        if ($formBuilder->handleRequest($request)->isSubmitted() && $formBuilder->isValid()) {

            $firstname = Request::getData('firstname');
            $lastname = Request::getData('lastname');
            $email = Request::getData('email');
            $password = Request::getData('password');

            $this->userRepository->registerUser($firstname, $lastname, $email, $password);

            return header('location: /');
        }

        return $this->render('register', [
            'form' => $formBuilder
        ]);

    }

    public function users(): Response
    {
        $users = [
            'users', $this->userRepository->getAllUsers()
        ];
        return $this->render('users', $users);
    }
}