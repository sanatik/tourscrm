<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation' => false,
    'type' => 'horizontal'
)); ?>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span8', 'maxlength' => 50)); ?>

    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span8', 'maxlength' => 50)); ?>

    <?php echo $form->textFieldRow($model, 'username2', array('class' => 'span8', 'maxlength' => 50)); ?>

    <?php echo $form->passwordFieldRow($model, 'password2', array('class' => 'span8', 'maxlength' => 50)); ?>

    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span8', 'maxlength' => 255)); ?>

    <?php echo $form->checkBoxRow($model, 'active'); ?>

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