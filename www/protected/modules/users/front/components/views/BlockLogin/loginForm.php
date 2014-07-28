
    <div id="login_form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'id' => 'login-form',
            'action' => Yii::app()->createUrl('/users/default/login')
        ));?>

        <?php  echo $form->textField($model, 'username', array('placeholder' => 'Введите логин', 'class' => 'login')); ?>
        <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Введите пароль', 'class' => 'password'))?>
        <button type="submit" class="j_button">Войти</button>

        <a class="registration" href="<?=Yii::app()->createUrl('users/default/registration')?>">Регистрация</a>


        <?php $this->endWidget() ?>
    </div>
