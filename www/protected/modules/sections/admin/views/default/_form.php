<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'sections-form',
        'enableAjaxValidation'=>false,
        'type' => 'horizontal',
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    )); ?>

    <?php echo $form->textFieldRow($model,'title',array('class'=>'span8','maxlength'=>255)); ?>
    <?php echo $form->textAreaRow($model,'description',array('class'=>'span8')); ?>
    <?php echo $form->textFieldRow($model,'price',array('append'=>'тг.')); ?>

    <?php if ($model->isNewRecord !== true || $model->image != '') { ?>
        <div class="controls">
            <div class="image">
                <img src="/upload/coffee/<?=$model->image;?>" alt="<?=$model->title;?>" width="100">
            </div>
        </div>
        <br>
        <?php echo $form->checkBoxRow($model, 'delete_image'); ?>
    <?php } ?>
    <div class="control-group">
        <label class="control-label" for="photoCover">Изображение</label>

        <div class="controls">
            <div class="input-append">
                <input id="photoCover" class="input-large" readonly="readonly" type="text">
                <a class="btn" onclick="$('input[id=Sections_Image]').click();">Обзор</a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('input[id=Sections_Image]').change(function () {
                $('#photoCover').val($(this).val());
            });
        });
    </script>
    <input type="file" id="Sections_Image" name="Sections[image]" style="display:none;" maxlength="255" class="span8" />

    <div class="control-group">
        <hr />
        <label class="control-label" for="ingredients"><strong>Ингредиенты</strong></label>
    </div>

    <?php if($modelCategories !== null){ ?>
        <?php
        $arrValue = unserialize($modelCategories['values']);
        if($arrValue != null){
            $arrValue = CHtml::listData($arrValue, 'ingredient_id', 'total');
            $str = "";
            foreach($arrValue as $key => $value){
                $title = Ingredients::model()->findByPk($key);
                $str .= '<div class="control-group">';
                    $str .= "<label class='control-label'>";
                        $str .= $title->label;
                    $str .= "</label>";
                    $str .= '<div class="controls">';
                        $str .= '<div class="input-append">';
                            $str .= "<input name='IngOld[$key]' type='text' class='span3 ingredients' value='$value' />";
                            $str .= '<span class="add-on">грм</span>';
                        $str .= '</div>';
                    $str .= '</div>';
                $str .= '</div>';
            }
            echo $str;
        }
        ?>
    <?php } else { ?>
    <div class="control-group" id="ingredientsNOT">
        <div class="controls">
            <div class="input-append">
                <label style="margin-top: 5px;">Ингредиентов нету. Хотите добавить?</label>
            </div>
        </div>
    </div>
    <?php } ?>
    <div id="addRecipeExist" class="controls" style="margin-top: 5px;">
        <button id="addRecipe">Добавить +</button>
    </div>
    <script type="text/javascript">
        var iCountElement = 0;
        $(function () {
            $('button[id=addRecipe]').click(function (e) {
                e.preventDefault();
                var value;
                var arrayOfNOT = "";
                $('.ingredients').each(function(){
                    value = $(this).attr('name');
                    value = value.substring(7, value.length-1);
                    arrayOfNOT += value + ",";
                });
                arrayOfNOT = arrayOfNOT.substring(0,arrayOfNOT.length-1);
                $.ajax({
                    type: "POST",
                    url: "/sections/default/getAllIngredients",
                    data: "arr="+arrayOfNOT + "&icount=" + iCountElement,
                    success: function(msg){
                        $('#addRecipeExist').prepend(msg);
                        $('#ingredientsNOT').html('');
                    }
                });
                iCountElement++;
            });
        });
    </script>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>