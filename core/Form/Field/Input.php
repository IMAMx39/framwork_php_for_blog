<?php

namespace Core\Form\Field;

use Core\Form\Field;

class Input extends Field
{

    protected function template(): string
    {
        $field = '<label for="' . $this->name . '">' . $this->label . '</label>' .
            '<input type="text" id="' . $this->name . '" name="' . $this->name . '"';

        foreach ($this->attributes as $attribute => $value) {
            $field .= ' ' . $attribute . '="' . $value . '"';
        }

        $field .= '>';

        return $field;
    }
}