<?php if (Yii::app()->user->hasFlash('success')): ?>

    <h3>Your password has been changed.</h3>
    <p>You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it by clicking on the "Change Password" link.</p>

<?php else: ?>

    <h3>Reset Your Password</h3>
    <p>Enter your email address below to reset your password.</p>

    <?php $form = $this->beginWidget('ActiveForm', array(
                            'action' => array('/forgot_password')))
    ?> 
        <p>
        <?= $form->label($model, 'email') ?><br/>
        <?= $form->textField($model, 'email') ?>
        <?= $form->errorEx($model, 'email') ?><br/>
        </p>
        <?= CHtml::submitButton('Reset &rarr;', array('class' => 'formbutton', 'encode' => FALSE)) ?>

    <?php $this->endWidget() ?>

<?php endif ?>
