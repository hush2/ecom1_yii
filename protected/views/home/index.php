<?php if (Yii::app()->user->hasFlash('logout')): ?>

    <h3>Logged Out</h3>
    <p>Thank you for visiting. You are now logged out. Please come back soon!</p>

<?php else: ?>

    <h3>Welcome</h3>
    <p>Welcome to Knowledge is Power, a site dedicated to keeping you up to date on the Web security and programming information you need to know.

    <h3>Most Popular Pages</h3>
    <p>
    <ol>
    <?php foreach (History::model()->mostPopular() as $page): ?>
        <li><h4><?= CHtml::link($page->title, array("/page/{$page->id}")) ?></h4></li>
    <?php endforeach ?>
    </ol>
    </p>

<?php endif ?>