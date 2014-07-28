<div class="registration_form">
<h1>Изменение данных</h1>
<hr>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'id' => 'registration-form'
        ));

        echo $form->errorSummary($model);
        ?>
        <table>
            <tr>
                <td><?php echo $form->label($model, 'user_type')?></td>
                <td><?php echo $form->radioButtonList($model, 'user_type', array('Физическое лицо', 'Юридическое лицо'))?>
                    <?php echo $form->error($model, 'user_type');?>
                </td>
            </tr>
            <tr>
                <td><?php if($model->user_type==0){ echo $form->label($model, 'data_name');}else{ echo $form->label($model, 'name'); }?></td>
                <td><?php echo $form->textField($model, 'data_name', array('class' => 'field'))?>
                    <?php echo $form->error($model, 'data_name');?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'email')?></td>
                <td><?php echo $form->textField($model, 'email', array('class' => 'field'))?>
                    <?php echo $form->error($model, 'email');?>
                </td>
            </tr>
			
            
            <tr>
                <td><?php echo $form->label($model, 'bin')?></td>
                <td><?php echo $form->textField($model, 'bin', array('class' => 'field'))?>
                    <?php echo $form->error($model, 'bin');?></td>
            </tr>
            <tr>
                <td><?php echo $form->label($model, 'is_gov')?></td>
                <td><?php echo $form->checkBox($model, 'is_gov')?>
                    <?php echo $form->error($model, 'is_gov');?></td>
            </tr>
            


            <tr>
                <td></td>
                <td>
                    <button class="blue_button">Сохранить</button>
                </td>
            </tr>
			
			<tr>
				<td>
					<?php if(Yii::app()->user->hasFlash('success')){
						echo Yii::app()->user->getFlash('success');
					} ?>
				</td>
			</tr>
        </table>


        <?php $this->endWidget();?>
    </div>