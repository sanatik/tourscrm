<?php
/**
 * Copyright (c) 2012 by Yevgeniy Dymov / johnluxor@hotmail.com
 */

return CMap::mergeArray(
    require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main.php'),
    array(
        'defaultController' => 'mainpage/default',
        'name' => '',
        'import' => array(
            'application.modules.categories.front.components.*',
            'application.modules.users.front.components.*',
            'application.modules.categories.models.*',
            'application.modules.langs.models.*',
            'application.modules.pages.models.*',
            'application.modules.comments.*',
            'application.modules.comments.front.components.*',
            'application.modules.comments.models.*',
            'application.modules.pages.front.components.*',
            'application.modules.pupils.models.*',
            'application.modules.gallery.models.*',
        ),
        'modules' => array(
            'mainpage',
            'pages'
        ),
        'components' => array(
            'user' => array(
                'loginUrl' => '/users/default/login/'
            ),
            'cart' => array(
                'class' => 'ext.shoppingCart.EShoppingCart',
            ),
            'ftp' => array(
                'class' => 'ext.gftp.GFtpApplicationComponent',
                //'host' => '178.89.110.135',
                //'port' => '21',
                'connectionString' => 'ftp://softdeco:A9k_1m1$@178.89.110.135:21',
                'timeout' => 120,
                'passive' => true
            ),
            'urlManager' => array(
                'class' => 'application.components.lxUrlManager',
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    '/view/<category>/<sefname>' => 'pages/default/view/',
                    'pupils' => 'pages/default/pupils/',
                    'pupil' => 'pupils/default/view/',
                    '/category/<sefname:\w+>' => 'pages/default/category',
                    '<language:(ru|kz|en)>/search' => 'search/default/index',

                    '<language:(ru|kz|en)>/mainpage/<action:\w+>' => 'mainpage/default/<action>',
                    '<language:(ru|kz|en)>/feedback/<action:\w+>' => 'feedback/default/<action>',
                ),
            ),
            'errorHandler' => array(
                // use 'site/error' action to display errors
                'errorAction' => 'site/error',
            ),
        )
    )
);