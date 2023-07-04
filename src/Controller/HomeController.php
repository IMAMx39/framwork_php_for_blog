<?php

namespace App\Controller;

use App\Service\UserService;
use Core\Controller;
use Core\Form\Field\Email;
use Core\Form\Field\Input;
use Core\Form\Field\Textarea;
use Core\Form\FormBuilder;
use Core\Form\Submit;
use Core\Request;
use Core\Response;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }


    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function contact(Request $request ): Response
    {


        $user = $this->userService->getUserFromSession();

        $formContact = new FormBuilder();

        $formContact->add((new Input('username',['id' => 'username', 'class' => 'form-control']))
            ->withLabel('Nom et Prénom'))
                    ->add((new Email('email',  ['id' => 'email', 'class' => 'form-control']))
                        ->withLabel('Email'))
                    ->add((new Textarea('subject', ['id' => 'subject', 'class' => 'form-control']))
                        ->withLabel('Votre message'));

        if ($formContact->handleRequest($request)->isSubmitted() && $formContact->isValid()) {

            $username = $request->post('username');
            $email = $request->post('email');
            $subject = $request->post('subject');


        }

        $data = [
            "form" => $formContact,
            "user" => $user?->getPseudo()
        ];

        return $this->render('home', $data);
    }
}