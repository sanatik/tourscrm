<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/themes/lxadmin/styles/component.css"/>
    <script type="text/javascript" src="/themes/lxadmin/js/jquery.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Tour CRM :: <?=$this->pageTitle?></title>
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
                        array('label' => 'Клиенты', 'items' => array(
                            array('label' => 'Добавить клиента', 'url' => $this->createUrl('/clients/default/create')),
                            array('label' => 'Клиенты', 'url' => $this->createUrl('/clients/default/admin')),
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
            'brand' => 'Tour CRM',
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