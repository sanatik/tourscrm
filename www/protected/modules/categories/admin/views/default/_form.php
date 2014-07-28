<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'categories-form',
        'enableAjaxValidation' => false,
        'type' => 'horizontal',
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    )); ?>

    <?php echo $form->dropDownListRow($model, 'section_id', Sections::getListItems(), array('class' => 'span8')); ?>

    <?php echo $form->textFieldRow($model, 'milk', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'syrup', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'coffee', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'orange', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'lemon', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'canella', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'sugar', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'cocoa', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'clove', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'badjan', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'honey', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>
    <?php echo $form->textFieldRow($model, 'ginger', array('append'=>'грм', 'maxlength' => 255, 'placeholder'=>'0')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'size' => 'large',
            'label' => $model->isNewRecord ? 'Создать' : 'Сохранить',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>