<?php

class Pages extends CActiveRecord
{    
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'pages';
    }

    public function rules()
    {
        return array(
            array('category_id, title, description, content', 'required'),
            array('category_id', 'exist', 'className' => 'Categories', 'attributeName' => 'id', 'message' => 'Please choose a category.'),
            array('title', 'length', 'max' => 64),
            array('description', 'length', 'max' => 128),
            array('content', 'length', 'max' => 1024),
        );
    }

    public function attributeLabels()
    {
        return array(
            'category_id' => 'Category',
            'title'       => 'Title',
            'description' => 'Description',
            'content'     => 'Content',
        );
    }

    public function add()
    {
        $allowed = '<div><p><span><br><a><img><h1><h2><h3><h4><ul><ol><li><blockquote><b><strong><em><i><u><strike><sub><sup><font><hr>';

        $this->title       = strip_tags($this->title);
        $this->description = strip_tags($this->description);
        $this->content     = strip_tags($this->content, $allowed);
        
        return $this->save();
    }

}
