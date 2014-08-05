<div class="navbar">
    <div class="navbar-inner">
        <span class="brand">Авторизация</span>
    </div>
</div>
<div class="well">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'type' => 'horizontal'
    )); ?>

    <?php echo $form->textFieldRow($model, 'username'); ?>

    <?php echo $form->passwordFieldRow($model, 'password'); ?>

    <?php echo $form->checkBoxRow($model, 'rememberMe'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'size' => 'large',
            'label' => 'Войти',
        )); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->