<?php

namespace Core\Form;

use Stringable;

abstract class Field implements Stringable
{

    protected string $name;
    protected string $label;

    protected array $attributes;
    protected array $constraints;

    public function __construct(string $name, string $label, array $attributes = [], array $constraints = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->attributes = $attributes;
        $this->constraints = $constraints;
    }
}
