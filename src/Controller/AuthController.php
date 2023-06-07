<?php

namespace App\Controller;

use Core\Controller;
use Core\Form\Field\Email;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\FormBuilder;
use Core\Request;
use Core\Response;

class AuthController extends Controller
{
    public function login(): Response
    {
        return $this->render('login', []);
    }

    public function register(Request $request): Response
    {


        $formBuilder = new FormBuilder('GET');

        $formBuilder
            ->add(
                (new Input('username', ['class' => 'form-control']))
                ->label('Utilisateur')
            )->add(
                (new Email('email',['class'=>'form-control']))
                ->label('Email')
            );
//            ->add(
//                (new Email('email', ['id' => 'toto', 'class' => 'form-control']))
//                ->label('Email')
//                ->render(function (Email $email) {
//                    return sprintf('%s<input type="" name="%s">%s', $email->getLabel()->start(), $email->getName(), $email->getLabel()->end());
//                })
//            );
//        $form = (new FormBuilder('', ['class' => 'form']))
//            ->add(
//                (new Text('firstname'))
//                    ->attr(['class' => 'toto'])
//                    ->constraints([
//                        new NotNull(),
//                        (new StringLength())->min(3),
//                    ])
//            )
//            ->add(new Text('lastname'))
//            ->add(new Email('email'))
//            ->add(new Textaera('description'));

//        if ($form->handleRequest($request)->isSubbmited() && $form->isValid()) {
//
//            //save in db
//            // redirection
//        }

        return $this->render('register', [
            'form' => $formBuilder
        ]);

    }
}