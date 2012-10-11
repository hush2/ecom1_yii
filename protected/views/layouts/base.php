<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $this->pageTitle ?: 'Knowledge is Power' ?></title>
    <?= CHtml::cssFile(Yii::app()->baseUrl . '/css/styles.css') ?>
</head>

<body>

<div id="wrap">
    <div class="header">
        <h1><?= CHtml::link('Knowledge is Power', array('/')) ?></h1>
        <h2>and it pays to know</h2>
    </div>
    <div id="nav">
    <?php
        $this->widget('zii.widgets.CMenu', array(
            'activeCssClass' => 'selected',
            'linkLabelWrapper' => 'span',
            'items' => array(
                array('label' => 'Home', 'url' => array('home/index')),
                array('label' => 'About', 'url' => array('home/about') ),
                array('label' => 'Contact', 'url' => array('home/contact')),
                array('label' => 'Register', 'url' => array('account/register'), 'visible' => Yii::app()->user->isGuest),
            ),
        ));
    ?>
    </div>
    <div class="page">
        <div class="content">
            <?= $content ?>
            <p><br clear="all" /></p>
        </div>
    <div class="sidebar">

        <?php if (Yii::app()->user->isGuest): ?>
            <?php $model = isset($this->model) ? $this->model : new Login;
                  $this->widget('LoginBox', array('model' => $model)) ?>

        <?php else: ?>
            <div class="title">
                <h4>Manage Your Account</h4>
            </div>
            <ul>
                <li><?= CHtml::link('Renew Account', array('/renew')) ?></li>
                <li><?= CHtml::link('Change Password', array('/change_password')) ?></li>
                <li><?= CHtml::link('Favorites', array('/favorites')) ?></li>
                <li><?= CHtml::link('History', array('/history')) ?></li>
                <li><?= CHtml::link('Logout', array('/logout')) ?></li>
            </ul>
            <?php if (Yii::app()->user->type == 'admin'): ?>
                <div class="title">
                    <h4>Administration</h4>
                </div>
                <ul>
                    <li><?= CHtml::link('Add Page', array('/add_page')) ?></a></li>
                    <li><?= CHtml::link('Add PDF', array('/add_pdf')) ?></a></li>
                </ul>
            <?php endif ?>
        <?php endif ?>

        <div class="title">
            <h4>Content</h4>
        </div>
        <ul>
            <?php foreach (Categories::model()->all() as $category): ?>
                <li><?= CHtml::link($category->category, array("/category/{$category->id}")) ?></li>
            <?php endforeach ?>
            <li><?= CHtml::link('PDF Guides', array('/pdfs')) ?></li>
        </ul>

    </div>

    <div class="footer">
        <p><a href="#" title="Site Map">Site Map</a> | <a href="#" title="Site Policies">Policies</a> &nbsp; - &nbsp; &copy; Knowledge is Power &nbsp; - &nbsp; Design by <a href="http://www.spyka.net">spyka webmaster</a></p>
    </div>

</div>
</div>
</body>
</html>


