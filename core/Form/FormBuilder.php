<?php

namespace Core\Form;

class FormBuilder
{
    private array $fields = [];
    private string $method;
    private string $action;

    public function __construct(string $method = 'POST', string $action = '')
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function add(Field $field): self
    {
        $this->fields[] = $field;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('<form action="%s" method="%s">%s</form>', $this->action, $this->method, implode('', $this->fields));
    }
}
