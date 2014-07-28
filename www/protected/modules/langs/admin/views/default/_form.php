<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'langs-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal'
)); ?>

            <?php echo $form->textFieldRow($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

                <?php echo $form->textFieldRow($model,'code',array('class'=>'span8','maxlength'=>10)); ?>

            <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>