<? if (Yii::app()->user->hasFlash('success')): ?>

    <h3>Thanks!</h3>
    <p>Thank you for registering! To complete the process, please now click the button below so that you may pay for your site access via PayPal. The cost is $10 (US) per year.</p>

<? else: ?>

    <h3>Register</h3>
    <p>Access to the site's content is available to registered users at a cost of $10.00 (US) per year. Use the form below to begin the registration process. <strong>Note: All fields are required.</strong> After completing this form, you'll be presented with the opportunity to securely pay for your yearly subscription via <a href="http://www.paypal.com">PayPal</a>

    <?php $form=$this->beginWidget('ActiveForm',
                        array('id' => 'register',
                              'action' => array('/register')))
    ?>
        <p>
        <?= $form->label($model, 'first_name') ?><br/>
        <?= $form->textField($model, 'first_name') ?>
        <?= $form->errorEx($model, 'first_name') ?>
        </p>
        <p>
        <?= $form->label($model, 'last_name') ?><br/>
        <?= $form->textField($model, 'last_name') ?>
        <?= $form->errorEx($model, 'last_name') ?>
        </p>
        <p>
        <?= $form->label($model, 'username') ?><br/>
        <?= $form->textField($model, 'username') ?>
        <?= $form->errorEx($model, 'username') ?>
        <small>Only letters and numbers are allowed.</small>
        </p>
        <p>
        <?= $form->label($model, 'email') ?><br/>
        <?= $form->textField($model, 'email') ?>
        <?= $form->errorEx($model, 'email') ?>
        </p>
        <p>
        <?= $form->label($model, 'pass') ?><br/>
        <?= $form->passwordField($model, 'pass') ?>
        <?= $form->errorEx($model, 'pass') ?>
        <small>Must be between 6 and 20 characters long, with at least one lowercase letter, one uppercase letter, and one number.</small>
        </p>
        <p>
        <?= $form->label($model, 'pass2') ?><br/>
        <?= $form->passwordField($model, 'pass2') ?>
        <?= $form->errorEx($model, 'pass2') ?>
        </p>
        <?= CHtml::submitButton('Next &rarr;', array('class' => 'formbutton', 'encode' => FALSE)) ?>

    <?php $this->endWidget() ?>

<? endif ?>
