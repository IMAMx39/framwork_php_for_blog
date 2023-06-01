<?php

namespace Core;

abstract class Model
{
     public const RULE_REQUIRED = 'required';
     public const RULE_EMAIL = 'email';
     public const RULE_MIN = 'min';
     public const RULE_MAX = 'max';
     public const RULE_MATCH = 'match';

    public function loadData($data): void
    {
        foreach ($data as $key => $value){
            if (property_exists($this,$key)){
                $this->{$key} =$value;
            }
        }
    }

    abstract public function rules() : array;

    public array$errors = [];
    public function validate(): void
    {
        foreach ($this->rules() as $att => $rules){
            $value = $this-> $att;
            foreach ($rules as $rule){
                $ruleName = $rule;
                if (!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($att, self::RULE_REQUIRED);
                }

            }
        }
    }

    private function addError(string $att, string $rule): void
    {
        $message = $this->getErrorMsg()[$rule] ?? '';
        $this->errors[$att][] = $message;
    }

    public function getErrorMsg(): array
    {
        return [
            self::RULE_REQUIRED => 'Ce champs est obligatoire',
            self::RULE_EMAIL => 'Email not valide',
            self::RULE_MIN => 'minimum de caractère {min}',
            self::RULE_MAX => 'maximum de caractère {max}',
            self::RULE_MATCH => 'le mot de passe doit etre identique'
        ];
    }

}