<?php if (Yii::app()->user->hasFlash('success')): ?>

    <h3>Your password has been changed.</h3>

<?php else: ?>

    <h3>Change Your Password</h3>
    <p>Use the form below to change your password.</p>

    <?php $form = $this->beginWidget('ActiveForm', array(
                            'action' => array('/change_password')))
    ?>
        <p>
        <?= $form->label($model, 'pass') ?><br/>
        <?= $form->passwordField($model, 'pass') ?>
        <?= $form->errorEx($model, 'pass') ?>        
        </p>
        <p>
        <?= $form->label($model, 'pass1') ?><br/>
        <?= $form->passwordField($model, 'pass1') ?>
        <?= $form->errorEx($model, 'pass1') ?>
        <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small>
        </p>
        <p>
        <?= $form->label($model, 'pass2') ?><br/>
        <?= $form->passwordField($model, 'pass2') ?>
        <?= $form->errorEx($model, 'pass2') ?>
        </p>
        <?= CHtml::submitButton('Change &rarr;', array('class' => 'formbutton', 'encode' => FALSE)) ?>

    <?php $this->endWidget(); ?>

<? endif ?>
