<?php

namespace App\Controller;

use App\Model\RegisterValidator;
use App\repository\UserRepository;
use Core\Controller;
use Core\Form\Field\Email;
use Core\Form\Field\Input;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;

class AuthController extends Controller
{
    private UserRepository $userRepository;

    /**
     */
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

        $model = new RegisterValidator();
        $formBuilder = new FormBuilder('POST', '/register');

        $formBuilder
            ->add(
                (new Input('username', ['id' => 'username', 'class' => 'form-control']))
                    ->withLabel('Utilisateur')
            )->add(
                (new Email('email', ['id' => 'email', 'class' => 'form-control']))
                    ->withLabel('Email')
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

            var_dump($request->request());
        }

        return $this->render('register', [
            'form' => $formBuilder
        ]);

    }

    public function register(): Response
    {
        $data = [
            'users' , $this->userRepository->getAllUser()
        ];
        return $this->render('register', $data);
    }
}