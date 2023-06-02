<?php

namespace Core\Form;

class TextareaField extends  BaseField
{

    public function renderInput()
    {
        return sprintf('<textarea class="form-control%s" name="%s">%s</textarea>',
            $this->model->hasError($this->att) ? ' is-invalid' : '',
            $this->att,
            $this->model->{$this->att},
        );
    }
}