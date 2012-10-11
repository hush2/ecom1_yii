<h3><?= $this->pageTitle ?></h3>

<?php if (Yii::app()->user->isGuest): ?>
    <p class='error'>Thank you for your interest in this content. You must be a logged in as a registered user to view this page in its entirety.</p>
    <div><?= $page->description ?></div>

<?php else: ?>
    <?php if (Yii::app()->user->isExpired): ?>
        <p class="error">Thank you for your interest in this content, but your account is no longer current. Please <?= CHtml::link('renew your account', array('/renew')) ?> in order to view this page in its entirety</p>
        <div><?= $page->description ?></div>

    <?php else: ?>
        <?php
        $heart = CHtml::image(Yii::app()->baseUrl.'/images/heart_48.png', '', array('align' => 'middle'));
        $cross = CHtml::image(Yii::app()->baseUrl.'/images/cross_48.png', '', array('align' => 'middle'));
        ?>
        <p>
        <?php if (Yii::app()->user->hasFlash('added')): ?>
            <?= $heart ?>This has been added to your favorites!<?= CHtml::link($cross, array("/remove_from_favorites/$page->id"), array('encode' => FALSE)) ?>

        <?php elseif (Yii::app()->user->hasFlash('removed')): ?>
            This page has been removed from your favorites!<?= $cross ?>

        <?php elseif (Favorites::model()->isFavorite($page->id)): ?>
            <?= $heart ?>This is a favorite!<?= CHtml::link($cross, array("/remove_from_favorites/$page->id"), array('encode' => FALSE)) ?>

        <?php else: ?>
            Make this a favorite!<?= CHtml::link($heart, array("/add_to_favorites/$page->id"), array('encode' => FALSE)) ?>

        <?php endif ?>
        </p>
        
        <div><?= nl2br($page->content) ?></div>
        
    <?php endif ?>
<?php endif ?>
