<?php

namespace Core\Form;

class InputField extends Field
{

    public function __toString(): string
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