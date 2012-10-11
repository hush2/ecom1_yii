<h3>Thanks!</h3>

<p>Thank you for your interest in renewing your account! To complete the process, please now click the button below so that you may pay for your renewal via PayPal. The cost is $10 (US) per year. <strong>Note: After renewing your membership at PayPal, you must logout and log back in at this site in order process the renewal.</strong></p>

<?php $form=$this->beginWidget('CActiveForm', array(
                        'action' => 'renew',))
?>    
    <?= CHtml::submitButton('Renew &rarr;', array('class' => 'formbutton',
                                                  'encode' => FALSE))
    ?>

<?php $this->endWidget() ?>