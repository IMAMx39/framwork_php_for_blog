<?php

namespace Core\Form\Field;

use Core\Form\Field;

class Textarea extends Field
{

//    public function __toString(): string
//    {
//        $field = '<input type="text" name="' . $this->name . '"';
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
        $field = '<input type="text" name="' . $this->name . '"';

        foreach ($this->attributes as $attribute => $value) {
            $field .= ' ' . $attribute . '="' . $value . '"';
        }

        $field .= '>';

        return $field;    }
}