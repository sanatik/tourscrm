<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список пользователей</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Создать пользователя</a></li>
        </ul>
    </div>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'users-grid',
    'type' => 'condensed bordered striped',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'username',
        'email',
        'active',
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
