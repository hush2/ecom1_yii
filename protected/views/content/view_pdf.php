<h3><?= $pdf->title ?></h3>

<?php if (Yii::app()->user->isGuest): ?>
    <p class='error'>Thank you for your interest in this content. You must be logged in as a registered user to view any of the PDFs listed below.</p>

<?php elseif (Yii::app()->user->isExpired): ?>
    <p class='error'>Thank you for your interest in this content. Unfortunately your account has expired. Please <?= CHtml::link('renew your account', array('/renew')) ?> in order to access this file.</p>

<?php endif ?>

<?= $pdf->description ?>
