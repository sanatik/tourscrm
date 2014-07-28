<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Создание вида кофе</span>
    </div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelIngredients' => $modelIngredients,
    'modelCategories' => $modelCategories)); ?>