<?php if (Yii::app()->user->hasFlash('success')): ?>
    <h4 class='success'>The PDF has been added!</h4>
<?php endif ?>

<h3><?= $this->pageTitle ?></h3>

<?php $form = $this->beginWidget('ActiveForm',
                        array('action' => array('/add_pdf'),
                              'htmlOptions' => array('enctype' => 'multipart/form-data')));
?>
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
    <fieldset><legend>Fill out the form to add a PDF to the site:</legend>
    <p>
    <?= $form->label($model, 'title') ?><br/>
    <?= $form->textField($model, 'title') ?>
    <?= $form->errorEx($model, 'title') ?>
    </p>
    <p>
    <?= $form->label($model, 'description') ?><br/>
    <?= $form->textArea($model, 'description', array('rows'=>'5', 'cols'=>'75')) ?>
    <?= $form->errorEx($model, 'description') ?>
    </p>
    <p>
    <?= $form->label($model, 'pdf') ?><br/>
    <?= $form->fileField($model, 'file_name') ?>
    <?= $form->errorEx($model, 'file_name') ?> <small>PDF only, 1MB Limit</small></p>
    <p>
    <?= CHtml::submitButton('Add This PDF', array('id'=>'submit_button', 'class'=>'formbutton')) ?>
    </p>
    </fieldset>

<?php $this->endWidget(); ?>

