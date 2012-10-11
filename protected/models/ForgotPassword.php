<?php

class ForgotPassword extends CFormModel
{
    public $email;

    public function rules()
    {
        return array(
            array('email', 'required'),
            array('email', 'email'),
            array('email', 'length', 'max' => 128),
            array('email', 'exist', 'className' => 'Users', 'message' => 'The submitted email address does not match those on file!'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => 'Email Address',
        );
    }
}
