<?php

namespace App\Controller;

use Core\Controller;
use Core\Form\EmailField;
use Core\Form\FormBuilder;
use Core\Form\InputField;
use Core\Form\PasswordField;
use Core\Form\Submit;
use Core\Form\TextareaField;
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


        $formBuilder = new FormBuilder();

        $formBuilder->add(new InputField('username','Prénom', ['class' => 'form-control'], ['required']));
        $formBuilder->add(new InputField('username','Nom', ['class' => 'form-control'], ['required']));
        $formBuilder->add(new EmailField('email', 'Email',['class' => 'form-control'], ['required']));
        $formBuilder->add(new PasswordField('password','Mot de passe',['class' => 'form-control'], ['required']));
        $formBuilder->add(new PasswordField('password','Retaper votre mot de passe ',['class' => 'form-control'], ['required']));

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