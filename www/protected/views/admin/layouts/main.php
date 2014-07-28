<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/themes/lxadmin/styles/component.css"/>
    <link rel="stylesheet" href="/themes/lxadmin/styles/offline-theme-slide.css"/>
    <script type="text/javascript" src="/themes/lxadmin/js/jquery.js"></script>
    <script type="text/javascript" src="/themes/lxadmin/js/offline.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Coffee :: <?=$this->pageTitle?></title>
    <style type="text/css">
        body {
            padding-top: 60px;
        }

        .navbar, .alert {
            margin-bottom: 5px;
        }

        .filter-container input, .filter-container select {
            width: 100%;
        }

    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".add_button").click(function(){
                var group = $('.last').closest('.control-group');
                group.last().clone().appendTo("#container");
                return false;
            });
        });
    </script>
    <script>
        var run = function(){
            var req = new XMLHttpRequest();
            req.timeout = 5000;
            req.open('GET', 'http://localhost:8888/walter/0', true);
            req.send();
        }

        setInterval(run, 3000);
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <?php
        if(Yii::app()->user->id == null){
            $itemsArray = array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'Авторизация', 'url' => '/users/default/login/'),
                    ),
                ),
            );
        } else {
            $username = Yii::app()->user->username;
            //$roleOfUser = Yii::app()
            $itemsArray = array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Главная', 'url' => '/'),
                        array('label' => 'Структура', 'items' => array(
                            array('label' => 'Виды', 'url' => $this->createUrl('/sections')),
                            array('label' => 'Ингредиенты', 'url' => $this->createUrl('/ingredients')),
                            '---',
                            array('label' => 'Точки', 'url' => $this->createUrl('/points')),
                        )),
                        array('label' => 'Заказы', 'url' => $this->createUrl('/orders'), 'active' => (@$this->getModule()->id == 'orders')),

                        array('label' => 'Статистика', 'items' => array(
                            array('label' => 'В точках', 'url' => $this->createUrl('/statpoint')),
                            '---',
                            array('label' => 'Ингредиенты', 'url' => $this->createUrl('/statcategory')),
                            array('label' => 'Типы', 'url' => $this->createUrl('/statsection')),
                        )),
                        array('label' => 'Пользователи', 'url' => $this->createUrl('/users'), 'active' => (@$this->getModule()->id == 'users')),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => "Выход ($username)", 'url' => '/admin.php/users/default/logout/'),
                    ),
                ),
            );
        }
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => null, // null or 'inverse'
            'brand' => 'Coffee',
            'brandUrl' => '#',
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => $itemsArray,
        )); ?>
    </div>
    <div class="row">
        <div class="span12">
            <?=$content;?>
        </div>
    </div>
</div>
</body>
</html>