<div class="title">
    <h4>Login</h4>
</div>

<?php $form = $this->beginWidget('ActiveForm',
                        array('action' => array('/login')))
?>
<p>
    <?php if ($form->error($model, 'message')): ?>
        <?= $form->errorEx($model, 'message') ?>
    <?php endif ?>

    <?= $form->label($model, 'email') ?><br/>
    <?= $form->textField($model, 'email') ?>
    <?= $form->errorEx($model, 'email') ?> 
    <br/>
    <?= $form->label($model, 'pass') ?><br/>
    <?= $form->passwordField($model, 'pass') ?>
    <?= $form->errorEx($model, 'pass') ?>

    <?= CHtml::link('Forgot?', array('/forgot_password')) ?><br/>
    <?= CHtml::submitButton('Login &rarr;', array('encode' => FALSE)) ?>
</p>

<?php $this->endWidget() ?>
