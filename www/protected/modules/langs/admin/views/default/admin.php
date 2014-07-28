
<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Список Langs</span>
        <ul class="nav nav-pills">
            <li class="divider-vertical"></li>
            <li><a href="<?=$this->createUrl('create');?>" class="">Создать Langs</a></li>
        </ul>
    </div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'langs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'code',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
