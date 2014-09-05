<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список клиентов</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Создать заявку</a></li>
        </ul>
    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ingredients-grid',
    'type' => 'bordered condensed stripped',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'type',
        'country',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonOptions' => array(
                'class' => 'btn btn-small update'
            ),
            'deleteButtonOptions' => array(
                'class' => 'btn btn-small delete'
            ),
            'htmlOptions' => array('width' => 100)
        ),
    ),
    'htmlOptions' => array(
        'class' => 'grid-view table-hover'
    )

)); ?>
