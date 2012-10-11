<h3><?= $this->pageTitle ?></h3>

<?php if (Yii::app()->user->isGuest): ?>
    <p class='error'>Thank you for your interest in this content. You must be logged in as a registered user to view site content.</p>

<?php elseif (Yii::app()->user->isExpired): ?>
    <p class="error">Thank you for your interest in this content. Unfortunately your account has expired. Please <?= CHtml::link('renew your account', array('/renew')) ?> in order to access site content.</p>

<?php endif ?>

<?php if (empty($favorites)): ?>
    <p>There are currently no pages of content associated with this category. Please check back again!</p>

<?php else: ?>

    <?php foreach ($favorites as $favorite): ?>
        <div>
            <h4><?= CHtml::link($favorite->page->title, array("page/{$favorite->page->id}")) ?></h4>
            <p><?= $favorite->page->description ?></p>
        </div>
    <?php endforeach ?>

<?php endif ?>
