<?php

class Login extends CFormModel
{
    public $email;
    public $pass;

    public function rules()
    {
        return array(
            array('email, pass', 'required'),
            array('email', 'exist', 'className' => 'Users'),
            array('pass', 'authenticate'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => 'Email Address',
            'pass'  => 'Password',
        );
    }

    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors())
        {
            $identity = new UserIdentity($this->email, $this->pass);
            if ($identity->authenticate())
            {
                $duration = 3600 * 24 * 7; // 7 days
                return Yii::app()->user->login($identity, $duration);
            }
            $this->addError('message', 'Incorrect username or password.');
        }
    }
}
