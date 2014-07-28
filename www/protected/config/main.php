<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Coffee',
    // preloading 'log' component
    'preload' => array('log', 'translate'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.sections.admin.models.*',
        'application.modules.rights.components.*',
        'application.modules.rights.components.*',
        'application.modules.rights.models.*',
        'application.modules.users.models.*',
        'application.modules.users.*',
        'application.modules.users.models.*',
        'application.extensions.UrlTransliterate',
    ),
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'aliases' => array(
        'bootstrap' => 'ext.bootstrap'
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'rights' => array(
            'layout' => 'application.modules.rights.views.layouts.main',
            'appLayout' => '//layouts/main',
            'install' => false,
            'userClass' => 'Users',
            'userNameColumn' => 'username',
            'userIdColumn' => 'id',
            'debug' => true,
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => false,
            'generatorPaths' => array(
                'ext.bootstrap.gii',
            ),
        ),
        'categories',
        'ingredients',
        'points',
        'city',
        'orders',
        'search',
        'sections',
        'users',
        //'translate',
    ),
    'behaviors' => array(
        'runEnd' => array(
            'class' => 'application.extensions.EndBehavior',
        ),
    ),
    // application components
    'components' => array(
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
        'shoppingCart' =>array(
            'class' => 'ext.yiiext.components.shoppingCart.EShoppingCart',
        ),
        'request' => array(
            'enableCookieValidation' => true,
            'enableCsrfValidation' => false,
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'RWebUser',
            'loginUrl' => '/admin.php/site/login/'
        ),
        'authManager' => array(
            'class' => 'RDbAuthManager',
            'defaultRoles' => array('Guest')
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array( /* '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',*/
            ),
        ),
        'swiftMailer' => array(
            'class' => 'ext.swiftMailer.SwiftMailer',
        ),

        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=coffee',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'lx_'
        ),
        'cache' => array(
            'class' => 'CFileCache',
        ),
        'session' => array(
            'class' => 'CDbHttpSession',
            'connectionID' => 'db',
            'autoCreateSessionTable' => false, //!!!
        ),
        'messages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('Ei18n', 'missingTranslation'),
            'sourceMessageTable' => 'SourceMessage',
            'translatedMessageTable' => 'Message'
        ),

        /* setup global translate application component */
        /*
        'translate' => array(
            'class' => 'translate.components.Ei18n',
            'createTranslationTables' => false,
            'connectionID' => 'db',
            'languages' => array(
                'kz' => 'Казахский',
                'ru' => 'Русский',
                'en' => 'Английский'
            )
        ),
        */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages

//                  array(
//                      'class'=>'CWebLogRoute',
//                      //'levels' => 'error, warning, info',
//
//                  ),

            ),
        ),
        'clientScript' => array(
            'scriptMap' => array(
                'jquery.js' => false,
                'jquery.min.js' => false,
                'jqueryui.js' => false,
            )
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'languages' => array(
            'kz' => 'Казахский',
            'ru' => 'Русский',
            'en' => 'Английский'
        ),
        'editorOptions' => array('filebrowserBrowseUrl' => array('/admin.php/pages/default/browse'),
            'extraPlugins' => 'Media',
            'toolbar' => array(
                array('Source', '-', 'Save', '-'),
                array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'),
                array('Undo', 'Redo', ' - ', 'Find', 'Replace', ' - ', 'SelectAll', 'RemoveFormat'),
                array('Bold', 'Italic', 'Underline', 'Strike', ' - ', 'Subscript', 'Superscript'),
                array('NumberedList', 'BulletedList', ' - ', 'Outdent', 'Indent', 'Blockquote'),
                array('JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'),
                array('Link', 'Unlink', 'Anchor'),
                //array('Styles', 'Format', 'FontSize', 'Font'),
                array('Image', 'Media', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar'),
                array('Maximize', 'ShowBlocks')),
        ),
        'livePlayer' => array(
            //автовопспроизведения
            'auto' => 'play',
            // путь к файлу
            'file' => 'rtmp://89.218.20.67:1937/live/elarna',
            //панель контролов
            'controls' => 'play,|,volume,volbarline,space,hd,|,menu,|,full,run_volume',
            // цвет фона
            'bgcolor' => 'ffffff',
            //тип медиа
            'm' => 'video',
            //высота
            'h' => 335,
            //ширина
            'w' => 645,
            //фон контролапнели
            'cntrlbgcolor' => '0|0',
            //язык
            'lang' => 'ru',
            // пропорции видео
            'aspect' => 1.77,
            // растягивать панель при полноэкранном
            'cntrlfull' => 1,
            // панель вне экрана
            'cntrlout' => 1,
            // фон панели контролов
            'cntrlposter' => '/themes/front/player/images/control_bg.png',
            //высота панели контролов
            'cntrloutheight' => 27,
            //вывод кода для расшаривания
            'codewithembed' => 1,
            // вывод большого меню
            'menubig' => 1,
            // авто меню построение
            'menuauto' => 1,
            // настройки скина

            //кнопка плей пауза
            'cntrl_play' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_play.png|http://kazahtv.softdeco.net/themes/front/player/images/icon_pause.png',
                'pic_w' => 20,
                'pic_h' => 20,
                'margintop' => 1
            ),
            //линия показа
            /*'cntrl_line' => array(
                'h' => 8,
                'full' => 1,
                'margintop' => -17,
                'position' => 1,
                'color_all' => '5b5c5a',
                'color_play' => '00364c',
                'bgcolor' => '5b5c5a',
                'bg_a' => 1,
                'all_a' => 1,
                'play_a' => 1,
                'a' => 0
            ),*/
            // линия громкости
            'cntrl_volbarline' => array(
                'h' => 4,
                'color_all' => '5b5c5a',
                'color_play' => '00364c',
                'bgcolor' => '5b5c5a',
                'bg_a' => 1,
                'all_a' => 1,
                'play_a' => 1,
                'a' => 0
            ),
            // бегунок громкости
            'cntrl_run_volume' => array(
                "h" => 12,
                "color" => "999999",
                "bg_o" => 0,
                "o" => 0,
                "w" => 4
            ),
            //иконка громкости
            'cntrl_volume' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/vol_on.png|http://kazahtv.softdeco.net/themes/front/player/images/vol_off.png',
                'margintop' => 1
            ),
            // бегунок прогресса показа
            'cntrl_run' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/play_run.png',
                'w' => 20,
                'h' => 20
            ),
            // общее время
            'cntrl_time_all' => array(
                'color' => '838382',
                'margintop' => 1
            ),
            // настройки полноэкрана
            'cntrl_full' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_full.png',
                'margintop' => 1
            ),
            //иконка меню
            'cntrl_menu' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_share.png',
                'margintop' => 1
            ),
        ),
        'videoPlayer' => array(
            //автовопспроизведения
            'auto' => 'play',
            // путь к файлу
            'file' => 'rtmp://89.218.20.67:1938/live/caspionet',
            //панель контролов
            'controls' => 'play,|,volume,volbarline,line,space,hd,|,menu,|,full,run_volume,run',
            // цвет фона
            'bgcolor' => 'ffffff',
            //тип медиа
            'm' => 'video',
            //высота
            'h' => 322,
            //ширина
            'w' => 620,
            //фон контролапнели
            'cntrlbgcolor' => '0|0',
            //язык
            'lang' => 'ru',
            // пропорции видео
            'aspect' => 1.77,
            // растягивать панель при полноэкранном
            'cntrlfull' => 1,
            // панель вне экрана
            'cntrlout' => 1,
            // фон панели контролов
            'cntrlposter' => '/themes/front/player/images/control_bg.png',
            //высота панели контролов
            'cntrloutheight' => 27,
            //вывод кода для расшаривания
            'codewithembed' => 1,
            // вывод большого меню
            'menubig' => 1,
            // авто меню построение
            'menuauto' => 1,
            // настройки скина

            //кнопка плей пауза
            'cntrl_play' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_play.png|http://kazahtv.softdeco.net/themes/front/player/images/icon_pause.png',
                'pic_w' => 20,
                'pic_h' => 20,
                'margintop' => 1
            ),
            //линия показа
            'cntrl_line' => array(
                'h' => 8,
                'full' => 1,
                'margintop' => -17,
                'position' => 1,
                'color_all' => '5b5c5a',
                'color_play' => '00364c',
                'bgcolor' => '5b5c5a',
                'bg_a' => 1,
                'all_a' => 1,
                'play_a' => 1,
                'a' => 0
            ),
            // линия громкости
            'cntrl_volbarline' => array(
                'h' => 4,
                'color_all' => '5b5c5a',
                'color_play' => '00364c',
                'bgcolor' => '5b5c5a',
                'bg_a' => 1,
                'all_a' => 1,
                'play_a' => 1,
                'a' => 0
            ),
            // бегунок громкости
            'cntrl_run_volume' => array(
                "h" => 12,
                "color" => "999999",
                "bg_o" => 0,
                "o" => 0,
                "w" => 4
            ),
            //иконка громкости
            'cntrl_volume' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/vol_on.png|http://kazahtv.softdeco.net/themes/front/player/images/vol_off.png',
                'margintop' => 1
            ),
            // бегунок прогресса показа
            'cntrl_run' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/play_run.png',
                'w' => 20,
                'h' => 20
            ),
            // общее время
            'cntrl_time_all' => array(
                'color' => '838382',
                'margintop' => 1
            ),
            // настройки полноэкрана
            'cntrl_full' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_full.png',
                'margintop' => 1
            ),
            //иконка меню
            'cntrl_menu' => array(
                'icon' => 'http://elarna29.softdeco.net/themes/front/player/images/icon_share.png',
                'margintop' => 1
            ),
        )


    )
);