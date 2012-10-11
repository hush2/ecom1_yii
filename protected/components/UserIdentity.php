<?php

class UserIdentity extends CUserIdentity
{
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function authenticate()
    {
        $user = Users::model()->findByAttributes(
                        array('email' => $this->username,
                              'pass'  => Users::model()->hash($this->password)));
        if (!$user)
        {
            return FALSE;
        }
        $this->id = $user->id;
        $this->setState('type', $user->type);
        $this->setState('isExpired', time() > strtotime($user->date_expires));
        return TRUE;        
    }    
}
