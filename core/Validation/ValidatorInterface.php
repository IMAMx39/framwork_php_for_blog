<?php

namespace Core\Validation;

interface ValidatorInterface
{
    public function validate($value): bool;

    public function getError(): ?string;
}