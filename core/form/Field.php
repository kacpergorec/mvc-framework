<?php

namespace App\Core\Form;

use App\Core\Model;

class Field
{

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';

    public Model $model;
    public string $attribute;
    public string $type;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <div class="form-group mt-3 w-100">
            <label class="mb-2" for="%s">%s</label>
            <input type="%s" id="%s" name="%s" value="%s" class="form-control%s">
            <small class="form-text text-danger"> %s</small>
        </div>
        ',
            $this->attribute, // For=
            $this->attribute, // Label text
            $this->type, // Type=
            $this->attribute, // Id=
            $this->attribute, // Name=
            $this->model->{$this->attribute}, // value
            $this->model->hasError($this->attribute) ? ' is-invalid' : '', //extra class
            $this->model->getFirstError($this->attribute) //error-text
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

}