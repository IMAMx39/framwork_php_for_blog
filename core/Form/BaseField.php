<?php

namespace Core\Form;

use Core\Model;

abstract class BaseField
{

    public Model $model;
    public string $att;
    public string $type;

    public function __construct(Model $model, string $att)
    {
        $this->model = $model;
        $this->att = $att;
    }

    public function __toString()
    {
        return sprintf('<div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>',
            $this->model->getLabel($this->att),
            $this->renderInput(),
            $this->model->getFirstError($this->att)
        );
    }

    abstract public function renderInput();
}