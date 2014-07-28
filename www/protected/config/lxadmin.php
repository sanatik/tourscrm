<?php
/**
 * Copyright (c) 2012 by Yevgeniy Dymov / johnluxor@hotmail.com
 */

return CMap::mergeArray(
    require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'main.php'),
    array(
        'preload' => array('bootstrap'),
        'name' => 'Панель управления',
        'components' => array(
            'user' => array(
                'loginUrl' => '/users/default/login/'
            ),
        )
    )
);