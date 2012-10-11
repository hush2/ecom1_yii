<?php

Yii::import('zii.widgets.CPortlet');

class LoginBox extends CPortlet
{
    public $model;

    protected function renderContent()
    {
        $this->render('//login_box', array('model' => $this->model));
    }
}
