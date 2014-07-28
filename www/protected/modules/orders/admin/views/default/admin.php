<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список заказов</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Принять заказ</a></li>
        </ul>
    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'sections-grid',
    'type' => 'bordered condensed stripped',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'name',
        array(
            'name' => 'point_id',
            'value' => '$data->point->title',
            'type' => 'raw',
            'filter' => Points::getListItems(),
        ),
        array(
            'name' => 'user_id',
            'value' => '$data->user->username',
            'type' => 'raw',
            'filter' => Users::getListItems(),
        ),
        array(
            'name' => 'orders',
            'value' => function($data){
                $str = "";
                if($data->orders != null){
                    $arrValue = unserialize($data->orders);
                    $arrValue = CHtml::listData($arrValue, 'section_id', 'count');
                    foreach($arrValue as $key => $value){
                        $title = Sections::model()->findByAttributes(array('id'=>$key));
                        $str .= $title->title . " - " . $value . "; <br />";
                    }
                    return $str;
                }
            },
            'type' => 'raw',
        ),
        'total',
        'date',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonOptions' => array(
                'class' => 'btn btn-large update'
            ),
            'deleteButtonOptions' => array(
                'class' => 'btn btn-large delete'
            )
        ),
    ),
    'htmlOptions' => array(
        'class' => 'grid-view table-hover'
    )

)); ?>
