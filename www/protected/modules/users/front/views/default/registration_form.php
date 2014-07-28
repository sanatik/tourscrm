<div class="add_menu">
    <ul>
        <li><a href="/">Главная</a></li>
    </ul>
</div>
<div class="block_header">
    <div class="breads"><?=Yii::t('users', 'Регистрация нового пользователя')?></div>
</div>

<article style="padding: 10px;">
    <div id="registration_form">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'id' => 'registration-form'
        ));

        echo $form->errorSummary($model);
        ?>
        <table>

            <tr>
                <td><?php echo $form->label($model, 'username')?></td>
                <td><?php echo $form->textField($model, 'username', array('class' => 'login'))?>
                    <?php echo $form->error($model, 'username');?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'password')?></td>
                <td><?php echo $form->passwordField($model, 'password', array('class' => 'login'))?>

                    <?php echo $form->error($model, 'password');?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'password_confirm')?></td>
                <td><?php echo $form->passwordField($model, 'password_confirm', array('class' => 'login'))?>
                    <?php echo $form->error($model, 'password_confirm');?></td>
            </tr>

            <tr>
                <td><?php echo $form->label($model, 'email')?></td>
                <td><?php echo $form->textField($model, 'email', array('class' => 'login'))?>
                    <?php echo $form->error($model, 'email');?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><?php  $this->widget('CCaptcha', array('buttonLabel' =>'<br />Обновить код')); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'captcha')?></td>
                <td>

                    <?php echo $form->textField($model, 'captcha', array('class' => 'login'))?>
                    <?php echo $form->error($model, 'captcha');?></td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <button class="j_button">Регистрация</button>
                </td>
            </tr>
        </table>


        <?php $this->endWidget();?>
    </div>
</article>

