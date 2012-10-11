<?php

class Controller extends CController
{
    public $layout = '//layouts/base';
    public $pageTitle;
    
    public function filters()
    {
        return array('accessControl', 'postOnly + login');
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions' => array('logout', 'changepassword', 'renew'),
                'controllers' => array('account'),
                'users' => array('?'),
            ),
            array('deny',
                'actions' => array('history', 'favorites', 'addtofavorites', 'removefromfavorites'),
                'controllers' => array('content'),
                'users' => array('?'),
            ),
            array('deny',
                'actions' => array('register', 'forgotpassword'),
                'controllers' => array('account'),
                'users' => array('@'),
            ),
            array('deny',
                'controllers' => array('admin'),
                'expression' => 'Yii::app()->user->isGuest OR Yii::app()->user->type != "admin"',
            ),
        );
    }    
}
