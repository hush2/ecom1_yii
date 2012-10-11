<?php

class History extends CActiveRecord
{
    public $title;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'history';
    }

    public function rules()
    {
        return array(
            array('user_id', 'numerical', 'integerOnly' => TRUE),
            array('page_id', 'numerical', 'integerOnly' => TRUE),
            array('pdf_id',  'numerical', 'integerOnly' => TRUE),
            array('type', 'in', 'range' => array('page', 'pdf')),
        );
    }


    public function relations()
    {
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'page' => array(self::BELONGS_TO, 'Pages', 'page_id'),
            'pdf'  => array(self::BELONGS_TO, 'Pdfs',  'pdf_id'),
        );
    }

    public function add($id, $type)
    {
        $model = new self;
 
        $model->user_id  = Yii::app()->user->id;
        $model->type     = $type;
        $type_id         = "{$type}_id";
        $model->$type_id = $id;

        return $model->save();
    }

    public function all($type)
    {
        $criteria = new CDbCriteria;

        $criteria->with = $type; // 'pdf' or 'page'.

        $criteria->compare('t.user_id', Yii::app()->user->id);
        $criteria->compare('t.type', $type);

        $criteria->group = "t.{$type}_id";
        $criteria->order = 't.date_created DESC';
        $criteria->limit = 10;

        return $this->findAll($criteria);
    }

    // Here is an example of Query Builder.
    public function mostPopular()
    {
        return $this->populateRecords( // Return as objects.
               $this->getDbConnection()
                    ->createCommand()
                    ->select(array('pages.id', 'pages.title', 'COUNT(history.id) as n'))
                    ->from('pages')
                    ->leftJoin('history', 'pages.id=history.page_id')
                    ->where('history.type="page"')
                    ->group('history.page_id')
                    ->order('n DESC')
                    ->limit(10)
                    ->queryAll()
                );
    }
}
