<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список ингредиентов</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Создать ингредиент</a></li>
        </ul>

    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'categories-grid',
    'type' => 'condensed bordered striped',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'section_id',
            'header' => 'Наименование',
            'value' => '$data->section->title',
            'type' => 'raw',
            'filter' => Sections::getListItems(),
        ),
        'values',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
            'updateButtonOptions' => array(
                'size' => 'large',
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
