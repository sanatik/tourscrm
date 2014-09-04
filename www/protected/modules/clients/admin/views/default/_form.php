<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'ingredients-form',
        'enableAjaxValidation'=>false,
        'type' => 'horizontal',
    )); ?>
    <?php echo $form->textFieldRow($model,'name',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'phones',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span8','maxlength'=>255)); ?>
    <?php
    $types = array('Входящий звонок'=>'Входящий звонок',
        'Исходящий звонок'=>'Исходящий звонок',
        'Зашедший клиент/проходил мимо'=>'Зашедший клиент/проходил мимо');
    echo $form->dropDownListRow($model,'typeOfClient',$types,array('class'=>'span8')); ?>

    <?php echo $form->checkBoxRow($model, 'isSendStatus'); ?>
    <?php echo $form->checkBoxRow($model, 'isSubscribe'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>