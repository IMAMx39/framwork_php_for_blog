<?php

namespace App\Controller;

use Core\Controller;
use Core\Form\Field\Email;
use Core\Form\Field\Input;
use Core\Form\Field\Textarea;
use Core\Form\FormBuilder;
use Core\Form\Submit;
use Core\Request;
use Core\Response;

class HomeController extends Controller
{



    public function contact(Request $request): Response
    {

        $formContact = new FormBuilder();

        $formContact
            ->add(
                (new Input('username', ['id' => 'username', 'class' => 'form-control']))
                    ->withLabel('Nom et Prénom')
            )->add(
                (new Email('email', ['id' => 'email', 'class' => 'form-control']))
                    ->withLabel('Email')
            )->add(
                (new Textarea('subject', ['id' => 'subject', 'class' => 'form-control']))
                    ->withLabel('Votre message')
            );

        if ($formContact->handleRequest($request)->isSubmitted() && $formContact->isValid()) {

            $username = Request::getData('username');
            $email = Request::getData('email');
            $subject = Request::getData('subject');


        }

        return $this->render('home', [
            "form" => $formContact
        ]);
    }

    public function home(Request $request): Response
    {
        return $this->render('home',[]);
    }
}