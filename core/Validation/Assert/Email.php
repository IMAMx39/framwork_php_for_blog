<?php

namespace Core\Validation\Assert;

use Core\Validation\Validator;

class Email extends Validator
{

    /**
     * @var string
     */
    private string $message = '{{ value }} is not a valid email address.';

    public function validate($value): bool
    {
        if ($value === null) {
            return true;
        }

        if (is_string($value) === false) {
            $this->error($this->message, ['value' => $value]);
            return false;
        }

        if ((bool)filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            $this->error($this->message, ['value' => $value]);
            return false;
        }

        return true;
    }

    public function message(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}