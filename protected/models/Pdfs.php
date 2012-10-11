<?php

class Pdfs extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'pdfs';
    }

    public function rules()
    {
        return array(
            array('title, description', 'required'),
            array('title', 'length', 'max' => 254),
            array('description', 'length', 'max' => 1024),
            array('file_name', 'file', 'types' => 'pdf', 'maxSize' => 1024*1024, 'on' => 'upload'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title'       => 'Title',
            'description' => 'Description',
            'file_name'   => 'File Name',
            'pdf'         => 'PDF',
        );
    }

    public function all()
    {
        return $this->findAll(array('order' => 'date_created DESC',
                                    'limit' => 10));
    }

    public function add($saveDir)
    {
        $uploadedFile      = CUploadedFile::getInstance($this, 'file_name');
        $tmpName           = sha1($uploadedFile->getName() . uniqid('', TRUE));

        // Move from tmp dir to 'application/protected/uploads'.
        $uploadedFile->saveAs("$saveDir/$tmpName");

        $this->tmp_name    = $tmpName;
        $this->title       = strip_tags($this->title);
        $this->description = strip_tags($this->description);
        $this->file_name   = $uploadedFile->getName();
        $this->size        = round($uploadedFile->getSize() /1024);

        return $this->save();
    }

}
