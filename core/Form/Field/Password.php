<?php

namespace Core\Form\Field;

use Core\Form\Field;

class Password extends Field
{

//    public function __toString(): string
//    {
//        $field = '<label for="' . $this->name . '">' . $this->label . '</label>' .
//            '<input type="password" id="' . $this->name . '" name="' . $this->name . '"';
//
//        foreach ($this->attributes as $attribute => $value) {
//            $field .= ' ' . $attribute . '="' . $value . '"';
//        }
//
//        $field .= '>';
//
//        return $field;
//    }

    protected function template(): string
    {
        $field = '<label for="' . $this->name . '">' . $this->label . '</label>' .
            '<input type="password" id="' . $this->name . '" name="' . $this->name . '"';

        foreach ($this->attributes as $attribute => $value) {
            $field .= ' ' . $attribute . '="' . $value . '"';
        }

        $field .= '>';

        return $field;
    }
}