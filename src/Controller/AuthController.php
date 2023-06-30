<?php

namespace App\Controller;

use App\Model\User;
use App\Repository\UserRepository;
use App\Service\UserService;
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

    public function handleRegister(Request $request): Response
    {

        $formBuilder = new FormBuilder();

        $formBuilder
            ->add(
                (new Input('pseudo', ['id' => 'pseuso', 'class' => 'form-control']))
                    ->withLabel('Pseudo')
            )->add(
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

        if ($formBuilder->handleRequest($request)->isSubmitted() && $formBuilder->isValid()) {

            $pseudo = $request->post('pseudo');
            $firstname = $request->post('firstname');
            $lastname = $request->post('lastname');
            $email = $request->post('email');
            $password = $request->post('password');
            $hashPsw = UserService::hashPassword($password);
//            $data = $formBuilder->getData();
            $user = (new User())
                ->setEmail($email)
                ->setPseudo($pseudo)
                ->setFirstname($firstname)
                ->setLastname($lastname)
                ->setPassword($hashPsw);

            $this->userRepository->register($user, $hashPsw);

            header('location: /');
            exit();
        }

        return $this->render('register', [
            'form' => $formBuilder
        ]);

    }
}
