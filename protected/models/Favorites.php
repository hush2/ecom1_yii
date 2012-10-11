<?php

class Favorites extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'favorite_pages';
    }

    public function rules()
    {
        return array(
            array('page_id', 'numerical', 'integerOnly' => TRUE),
            array('user_id', 'numerical', 'integerOnly' => TRUE),
        );
    }

    public function relations()
    {
        return array(
            'page' => array(self::BELONGS_TO, 'Pages', 'page_id'),
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    public function isFavorite($page_id)
    {
        return $this->exists(array(
                'condition' => 'page_id=:page_id AND user_id='.Yii::app()->user->id,
                'params' => array(':page_id' => $page_id)));
    }

    public function add($page_id)
    {
        if (Pages::model()->findByPk($page_id))
        {
            $model = new self;

            $model->user_id = Yii::app()->user->id;
            $model->page_id = $page_id;

            return $model->save();
        }
    }

    public function remove($page_id)
    {
        if (Pages::model()->findByPk($page_id))
        {
            return $this->findByAttributes(
                        array('page_id' => $page_id,
                              'user_id' => Yii::app()->user->id))
                        ->delete();
        }
    }

    public function all()
    {
        return $this->with('page')
                    ->findAllByAttributes(
                        array('user_id' => Yii::app()->user->id),
                        array('order' => 'title',
                              'limit' => 10)
                    );
    }

}
