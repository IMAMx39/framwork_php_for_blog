<?php

namespace Core\Form;

class EmailField extends Field
{
    public function __toString(): string
    {
        $attributes = [];
        foreach ($this->attributes as $key => $value) {
            $attributes[] = "{$key}={$value}";
        }
        return sprintf('<label for="' . $this->name . '">' . $this->label . '</label>
                                <input type="email" id="'.$this->name. '" name="%s" %s>'
            ,$this->name , implode('',$attributes));

    }
}
