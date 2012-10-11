<?php

class Users extends CActiveRecord
{
    public $username;
    public $expired;
    public $pass2;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return array(
            array('username, email, pass, first_name, last_name', 'required'),
            array('username', 'match', 'pattern' => '/^\w+$/', 'message' => 'Letters and numbers only.'),
            array('username', 'length', 'max' => 30),
            array('first_name', 'length', 'max' => 20),
            array('last_name', 'length', 'max' => 40),
            array('username', 'unique', 'className' => 'Users', 'on' => 'register'),
            array('email', 'length', 'max' => 80),
            array('email', 'email'),
            array('email', 'unique', 'className' => 'Users', 'on' => 'register'),
            array('pass', 'length', 'max' => 32),
            array('pass', 'match', 'pattern' => '/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/',
                  'message' => 'Please enter a valid password!', 'on' => 'register'),
            array('pass2', 'required', 'on' => 'register'),
            array('pass2', 'compare', 'compareAttribute' => 'pass', 'on' => 'register'),

        );
    }

    public function attributeLabels()
    {
        return array(
            'first_name' => 'First Name',
            'last_name'  => 'Last Name',
            'username'   => 'Desired Username',
            'email'      => 'Email Address',
            'pass'       => 'Password',
            'pass2'      => 'Confirm Password',
        );
    }

    public function add()
    {
        $this->scenario = 'insert';

        $this->pass = $this->hash($this->pass);
        $this->date_expires = new CDbExpression('ADDDATE(NOW(), INTERVAL 1 MONTH)');

        return $this->save();
    }

    public function changePassword($password)
    {
        $user = $this->findByPk(Yii::app()->user->id);

        $user->pass = $this->hash($password);
        $user->date_modified = new CDbExpression('NOW()');

        return $user->save();
    }

    public function createNewPassword($email)
    {
        $user = $this->findByAttributes(array('email' => $email));
        if ($user)
        {
            $new_password = substr(md5(uniqid(rand(), TRUE)), 10 ,15);
            $user->pass = $this->hash($new_password);
            $user->date_modified = new CDbExpression('NOW()');
            if ($user->save())
            {
                return $new_password;
            }
        }
    }

    public function renew()
    {
        $this->scenario = 'insert';
        $this->date_expires = new CDbExpression('ADDDATE(NOW(), INTERVAL 1 MONTH)');
        return $this->save();
    }

    public function hash($password)
    {
        return hash_hmac('sha256', $password, 'rainbow', TRUE);
    }

}
