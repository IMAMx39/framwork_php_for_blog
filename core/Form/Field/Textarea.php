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
        $attributes = [];
        foreach ($this->attributes as $key => $value) {
            $attributes[] = "{$key}={$value}";
        }
        return sprintf(
            '%s<textarea type="text" name="%s" %s></textarea>',
            $this->label,
            $this->name,
            implode(' ', $attributes));
    }
}