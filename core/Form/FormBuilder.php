<?php

namespace Core\Form;

use stdClass;

class FormBuilder
{
    private array $fields;


    public function __construct()
    {
        $this->fields = [];
    }

    public function add(Field $field): void
    {

        $this->fields[] = $field;
    }

    public function __toString(): string
    {
        return  sprintf('<form>%s</form>',implode('', $this->fields));
    }

}
