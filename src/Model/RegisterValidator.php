<?php

namespace App\Model;

use Core\Validation\Validator;

class RegisterValidator
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $passwordConfirm;


    public function __construct()
    {
    }

    public function register()
    {
        echo 'Creation d un compte';
    }



}