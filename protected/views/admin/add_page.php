<h3><?= $this->pageTitle ?></h3>

<?php if (Yii::app()->user->hasFlash('success')): ?>
    <h4 class='success'>The page has been added!</h4>
<?php endif ?>

<?php $form = $this->beginWidget('ActiveForm',
                        array('action'=>array('/add_page')))
?>
    <fieldset><legend>Fill out the form to add a page of content:</legend>
    <p>
    <?= $form->label($model, 'title') ?><br/>
    <?= $form->textField($model, 'title') ?>
    <?= $form->errorEx($model, 'title') ?>
    </p>
    <p>
    <?= $form->label($model, 'category_id') ?><br/>
    <?php
    $options = array('none'=>'Select One');
    foreach (Categories::model()->all() as $category)
    {
        $options[$category->id] = $category->category;
    }
    echo $form->dropDownList($model, 'category_id', $options);
    ?>
    <?= $form->errorEx($model, 'category_id') ?>
    </p>
    <p>
    <?= $form->label($model, 'description') ?><br/>
    <?= $form->textArea($model, 'description', array('rows'=>'5', 'cols'=>'75')) ?>
    <?= $form->errorEx($model, 'description') ?>
    </p>
    <p>
    <?= $form->label($model, 'content') ?><br/>
    <?= $form->textArea($model, 'content', array('rows'=>'5', 'cols'=>'75', 'id'=>'tinyeditor')) ?>
    <?= $form->errorEx($model, 'content') ?>
    </p>
    <p>
    <?= CHtml::submitButton('Add This Page', array('id'=>'submit', 'class'=>'formbutton', 'encode'=>FALSE)) ?>

<?php $this->endWidget() ?>

<?php $this->renderPartial('_editor'); ?>

