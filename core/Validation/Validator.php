<?php

namespace Core\Validation;

abstract class Validator implements ValidatorInterface
{
    protected ?string $error;

    public function getError(): ?string
    {
        return $this->error;
    }

    protected function error(string $message, array $context): void
    {
        $replace = [];
        foreach ($context as $key => $value) {
            if (is_object($value)) {
                $value = method_exists($value, '__toString') ? (string)$value : get_class($value);
            } elseif (is_array($value)) {
                $value = json_encode($value);
            } else {
                $value = (string)$value;
            }
            $replace['{{ ' . $key . ' }}'] = $value;
        }

        $this->error = strtr($message, $replace);
    }


}