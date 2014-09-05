<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'ingredients-form',
        'enableAjaxValidation'=>false,
        'type' => 'horizontal',
    )); ?>
    
    <?php echo $form->dropDownListRow($model,'client_id',  Clients::model()->listClients(),array('class'=>'span8')); ?>
    <?php
    $types = array('Тур'=>'Тур',
        'Визовый тур'=>'Визовый тур',
        'Экскурсионный тур'=>'Экскурсионный тур',
        'Билеты'=>'Билеты',
        'Страховка'=>'Страховка',
        'SIM'=>'SIM',
        'Другая'=>'Другая');
    echo $form->dropDownListRow($model,'type',$types,array('class'=>'span8')); ?>
    
    <?php echo $form->textFieldRow($model,'country',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'amount',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'childs',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'amountOfNights',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'budget',array('class'=>'span8','maxlength'=>255)); ?>
    <?php
    $types = array('Знакомые/друзья'=>'Знакомые/друзья',
        'Интернет'=>'Интернет',
        'Наружная реклама'=>'Наружная реклама',
        'Печатная реклама'=>'Печатная реклама',
        'Постоянный клиент'=>'Постоянный клиент',
        'Рекомендация клиентов'=>'Рекомендация клиентов',
        'Сайт турфирмы'=>'Сайт турфирмы');
    echo $form->dropDownListRow($model,'bidSource',$types,array('class'=>'span8')); ?>
    <?php echo $form->textAreaRow($model,'comment',array('class'=>'span8')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
