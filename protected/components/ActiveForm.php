<?php

class ActiveForm extends CActiveForm
{
    // Remove the DIV tag from the validation error message.
    public function errorEx($model, $attr)
    {   
        $error = strip_tags($this->error($model, $attr));
        return "<span class='error'>{$error}</span>";
    }    
}
