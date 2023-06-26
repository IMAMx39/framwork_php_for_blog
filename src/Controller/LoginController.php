<?php

namespace App\Controller;

use App\repository\UserRepository;
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

    public function __construct()
    {
        $this->userRepository = new UserRepository();
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

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {

            $email = Request::getData('email');
            $password = Request::getData('password');

            $this->loginUser($email, $password);

        }

        return $this->render('login', [
            "form" => $form
        ]);
    }

    private function loginUser(string $email, string $password): void
    {
        $this->userRepository->getUserLogin($email, $password);
        dump((new SessionBlog())->get('pseudo'));

         header('location: /');
         exit();

    }

}