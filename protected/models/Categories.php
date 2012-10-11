<?php

class Categories extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'categories';
    }

    public function all()
    {
        return $this->findAll(array('order' => 'category'));
    }
}
