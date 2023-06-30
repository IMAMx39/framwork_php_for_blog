<?php

namespace App\Controller;

use App\Model\User;
use App\Repository\UserRepository;
use App\Service\UserService;
use App\SessionBlog;
use Core\Controller;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;
use Core\Session;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class LoginController extends Controller
{
    private UserRepository $userRepository;
    private UserService $userService;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->userService = new UserService();
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function login(Request $request): Response
    {
        $form = new FormBuilder('POST', '/login');

        $form
            ->add((new Input('email', ['id' => 'email', 'class' => 'form-control']))
                ->withLabel('Email')
            )->add(
                (new Password('password', ['id' => 'password', 'class' => 'md-4 form-control']))
                    ->withLabel('Mot de passe')
            );

        $errors = [];
        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {

            $email = $request->post('email');
            $password = $request->post('password');

//            $this->loginUser($email, $password);
            $user = $this->userRepository->getUser($email);
            if ($user instanceof User && UserService::verifyPassword($password, $user->getPassword())) {
                $this->userService->login($user);
                header('location: /home');
                exit();
            }

            $errors = ['User not found or wrrong password'];
        }

        return $this->render('login', [
            "form" => $form,
            "errors" => $errors,
        ]);
    }

}