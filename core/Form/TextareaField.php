<?php

namespace Core\Form;

class TextareaField extends Field
{

    public function __toString(): string
    {
        $field = '<input type="text" name="' . $this->name . '"';

        foreach ($this->attributes as $attribute => $value) {
            $field .= ' ' . $attribute . '="' . $value . '"';
        }

        $field .= '>';

        return $field;
    }
}