<?php $this->widget('BlockWidjet'); ?>
<div class="password_restore">
<h1>Изменение пароля</h1>
<hr>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
)); ?>
<table>
    <tr>
        
        <td>
            <?php echo $form->passwordField($model, 'oldPassword', array('class' => 'field', 'value' => '')); ?>
            <?php echo $form->error($model, 'oldPassword'); ?>
        </td>
		<td><?php echo $form->label($model, 'oldPassword')?></td>
    </tr>
    <tr>
       
        <td>
            <?php echo $form->passwordField($model, 'newPassword', array('class' => 'field', 'value' => '')); ?>
            <?php echo $form->error($model, 'newPassword'); ?>
        </td>
		 <td>
            <?php echo $form->label($model, 'newPassword')?>
        </td>
    </tr>
    <tr>
        
        <td>
            <?php echo $form->passwordField($model, 'confirm_newPassword', array('class' => 'field', 'value' => '')); ?>
            <?php echo $form->error($model, 'confirm_newPassword'); ?>
        </td>
		<td>
            <?php echo $form->label($model, 'confirm_newPassword')?>
        </td>
    </tr>
    <tr>
        
        <td>    <?php echo CHtml::submitButton('Изменить', array('class' => 'blue_button')); ?>
        </td>
    </tr>
</table>

<?php $this->endWidget(); ?>

</div>