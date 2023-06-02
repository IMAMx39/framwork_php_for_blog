<?php

namespace Core\Form;

use Core\Model;

class Field extends BaseField
{

    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_FILE = 'file';


    public function __construct(Model $model, string $att)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $att);
    }

    public function renderInput()
    {
        return sprintf('<input type="%s" class="form-control%s" name="%s" value="%s">',
            $this->type,
            $this->model->hasError($this->att) ? ' is-invalid' : '',
            $this->att,
            $this->model->{$this->att},
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function fileField()
    {
        $this->type = self::TYPE_FILE;
        return $this;
    }
}