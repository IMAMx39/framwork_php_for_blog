<?php

namespace App\Model;

use Core\Validation\Validator;

class RegisterValidator extends Validator
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

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED ,self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN ,'min' => 8 ],[self::RULE_MAX, 'max' => 18]],
            'passwordConfirm' => [self::RULE_REQUIRED,[self::RULE_MATCH, 'match' =>'password']],
        ];
    }

}