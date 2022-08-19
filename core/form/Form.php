<?php

namespace App\Core\Form;

use App\Core\Model;

class Form
{

    public static function begin($action, $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);

        return new self();
    }

    public static function end(): void
    {
        echo '</form>';
    }

    public static function field(Model $model, $attribute): Field
    {
        return new Field($model, $attribute);
    }

}