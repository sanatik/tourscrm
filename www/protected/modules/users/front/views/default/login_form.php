
<div class="block_header">
    <div class="breads"><?=Yii::t('users', 'Авторfdsизация')?></div>
</div>

<?php $form = $this->beginWidget('CActiveForm', array(
    'method' => 'post',
    'enableAjaxValidation' => false
));

?>

<table style="padding: 10px;">
    <tr>
        <td><?=$form->labelEx($model, 'username')?></td>
        <td><?=$form->textField($model, 'username', array('class' => 'login'))?></td>
    </tr>
    <tr>
        <td><?=$form->labelEx($model, 'password')?></td>
       <td><?=$form->passwordField($model, 'password', array('class' => 'password'))?></td>
    </tr>
    <tr>
       <td></td>
       <td>
            <button class="j_button">Войти</button>
       </td>
    </tr>
</table>

<?php $this->endWidget(); ?>
