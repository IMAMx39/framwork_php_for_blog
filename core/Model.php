<?php

namespace Core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public array $errors = [];

    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $att => $rules) {
            $value = $this->{$att};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($att, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($att, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($att, self::RULE_MIN, ['min' => $rule['min']]);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($att, self::RULE_MAX);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($att, self::RULE_MATCH, ['match' => $rule['match']]);
                }
            }
        }
        return empty($this->errors);
    }

    abstract public function rules(): array;

    private function addError(string $att, string $rule, $params = []): void
    {
        $params['field'] ??= $att;
        $errorMsg = $this->getErrorMsg($rule);
        foreach ($params as $key => $value) {
            $errorMsg = str_replace("{{$key}}", $value, $errorMsg);
        }
        $this->errors[$att][] = $errorMsg;
    }

    public function getErrorMsg(): array
    {
        return [
            self::RULE_REQUIRED => 'Ce champs est obligatoire',
            self::RULE_EMAIL => 'Email not valide',
            self::RULE_MIN => 'minimum de caractère {min}',
            self::RULE_MAX => 'maximum de caractère {max}',
            self::RULE_MATCH => 'le mot de passe doit etre identique'];
    }
    public function hasError($att)
    {
        return $this->errors[$att] ?? false;
    }

    public function getFirstError($att)
    {
        $errors = $this->errors[$att] ?? [];
        return $errors[0] ?? '';
    }

    public function labels(): array
    {
        return [];
    }

    public function getLabel($att)
    {
        return $this->labels()[$att] ?? $att;
    }


}