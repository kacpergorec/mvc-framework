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
        <div class="p-2 w-full relative">
              <label for="%s" class="leading-7 text-sm">%s</label>
              <input type="%s" id="%s" name="%s" value="%s"
                     class="dark:text-gray-200 w-full bg-gray-100 dark:bg-stone-800 bg-opacity-50 rounded border border-gray-300 dark:border-stone-700 focus:ring-1 ring-primary-500 dark:focus:bg-stone-700 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              <div class="text-rose-600">
                    %s
              </div>
        </div>
        ',
            $this->attribute, //for
            $this->attribute, //label text
            $this->type, //type
            $this->attribute, //id
            $this->attribute, //name
            $this->model->{$this->attribute}, // value
//            $this->model->hasError($this->attribute) ? 'is-invalid' : '', //extra class
            $this->model->getFirstError($this->attribute) //error-text
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

}