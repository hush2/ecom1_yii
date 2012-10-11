<?php

class ChangePassword extends CFormModel
{
    public $pass;
    public $pass1;
    public $pass2;

    public function rules()
    {
        return array(
            array('pass, pass1, pass2', 'required'),
            array('pass', 'verify'),
            array('pass1', 'match', 'pattern' => '/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/',
                  'message' => 'Please enter a valid password!'),            
            array('pass2', 'compare', 'compareAttribute' => 'pass1'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'pass'  => 'Current Password',
            'pass1' => 'New Password',
            'pass2' => 'Confirm New Password',
        );
    }

    public function verify()
    {
        if (!$this->hasErrors())
        {
            $user = Users::model()->findByPk(Yii::app()->user->id);
            if ($user->pass !== Users::model()->hash($this->pass))
            {
                $this->addError('pass', 'Your current password is incorrect!');
            }
        }
    }
}
