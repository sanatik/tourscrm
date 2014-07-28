<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список видов кофе</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Создать вид</a></li>
        </ul>
    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'sections-grid',
    'type' => 'bordered condensed stripped',
    'dataProvider' => $model->search(),
    'columns' => array(
        'id',
        'title',
        'description',
        'price',
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
