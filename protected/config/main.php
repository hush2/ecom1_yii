<?php

$dbHost = getenv('MYSQL_DB_HOST')  ?: 'localhost';
$dbName = getenv('MYSQL_DB_NAME')  ?: 'ecom1_yii';
$dbUser = getenv('MYSQL_USERNAME') ?: 'root';
$dbPass = getenv('MYSQL_PASSWORD') ?: 'beer';

Yii::setPathOfAlias('uploads',__DIR__.'/../uploads');

return array(

    'basePath' => __DIR__.'/..',
    'defaultController' => 'home',

    // preloading 'log' component
    //'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    /*
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'drowssap',
            'ipFilters' => array('127.0.0.1','::1'),
        ),
    ),
    */

    'components' => array(

        'user' => array(
            'loginUrl' => array('/'),
            'allowAutoLogin' => TRUE,
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => FALSE,
            'rules' => array(
                // Original routes.
                'about'             => 'home/about',
                'contact'           => 'home/contact',
                'register'          => 'account/register',
                'renew'             => 'account/renew',
                'login'             => 'account/login',
                'logout'            => 'account/logout',
                'forgot_password'   => 'account/forgotpassword',
                'change_password'   => 'account/changepassword',
                'favorites'         => 'content/favorites',
                'history'           => 'content/history',
                'add_page'          => 'admin/addpage',
                'add_pdf'           => 'admin/addpdf',
                'pdfs'              => 'content/pdfs',

                'category/<category_id:\d+>'          => 'content/category',
                'page/<page_id:\d+>'                  => 'content/page',
                'view_pdf/<tmp_name:\w+>'             => 'content/viewpdf',
                'add_to_favorites/<page_id:\d+>'      => 'content/addtofavorites',
                'remove_from_favorites/<page_id:\d+>' => 'content/removefromfavorites',

                //'<controller:\w+>/<id:\d+>' => '<controller>/view',
                //'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                //'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'db' => array(
            'connectionString'    => "mysql:host=$dbHost;dbname=$dbName",
            'emulatePrepare'      => TRUE,
            'username'            => $dbUser,
            'password'            => $dbPass,
            'charset'             => 'utf8',
            'enableParamLogging'  => TRUE,
        ),

        /*
        'errorHandler' => array(
            'errorAction' => '//home/error',
        ),
        /*

        /*
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
        */
    ),

    'params' => array(
        'adminEmail' => 'hushywushy@gmail.com',
    ),
);
