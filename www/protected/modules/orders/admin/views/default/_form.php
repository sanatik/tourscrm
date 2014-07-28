<style type="text/css">
    #listCoffeeAll td
    {
        vertical-align: middle;
    }
</style>
<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>
<div class="well">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'orders-form',
        'enableAjaxValidation'=>false,
        'type' => 'horizontal'
    )); ?>
    <?php echo $form->textFieldRow($model,'name',array('class'=>'span3','maxlength'=>255)); ?>
    <?php
    $sumOfMoney = 0;
    $arrValue = array();
    if($model->orders != null){
        $strTable = "";
        $iClassName = 0;
        $arrValue = unserialize($model->orders);
        $arrValue = CHtml::listData($arrValue, 'section_id', 'count');
        foreach($arrValue as $key => $value){
            $title = Sections::model()->findByAttributes(array('id'=>$key));
            $strTable .= '<tr dataId="'.$key.'" class="';
            if($iClassName%2 == 0){
                $strTable .= "odd";
            } else {
                $strTable .= "even";
            }
            $strTable .= '">';
            $summ = $title->price * $value;
            $strTable .= "<td>$title->title</td>
                <td><input class='coffeeAddInput' type='text' value='".$value."' name='Coffee[".$key."]' dataId='".$iClassName."'/></td>
                <td>$title->price</td>
                <td class='sum'>$summ</td>
                <td class='button-column'><a class='btn btn-large deleteCoffeeOutList' dataId='".$key."' data-original-title='Удалить' rel='tooltip' href='#'><i class='icon-trash'></i></a></td>
            </tr>";
            $sumOfMoney += $summ;
            $iClassName++;
        }
    }
    ?>
    <div class="control-group">
        <label class="control-label required" for="Orders_orders">Заказы <span class="required">*</span></label>
        <label class="control-label">на сумму: <span id="sumOfMoney" name="Orders[total]"><?=$sumOfMoney;?></span> тг.</label>
    </div>
    <div id="listOfAddingCoffee">
    <?php
        if($model->orders != null){
            echo '<table id="listCoffeeAll" class="items table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th id="sections-grid_c0">Название</th>
                            <th id="sections-grid_c1">Количество</th>
                            <th id="sections-grid_c2">Цена</th>
                            <th id="sections-grid_c3">Сумма</th>
                            <th class="button-column" id="sections-grid_c7"> </th>
                        </tr>
                    </thead>
                    <tbody>';
            echo $strTable;
            echo '</tbody>
                </table>';
        } else {
            echo "<blockquote><i>Список пуст.</i></blockquote>";
        }
    ?>
    </div>
    <script type="text/javascript" src="/themes/lxadmin/js/orders.js"></script>
    <div style="clear: both;"></div>
    <hr>
    <div class="control-group">
        <label class="control-label" style="width: 200px;">Список кофейных напитков :</label>
    </div>
    <hr>
    <?php
    $listOfAllCoffee = Sections::getListItems(); // все
    $listOfHiddenCoffee = array_diff_key($listOfAllCoffee,$arrValue); // доступные
    echo '<ul class="cbp-rfgrid">';
    foreach($listOfAllCoffee as $key => $value){
        $isHidden = false;
        if($arrValue != null)
            foreach($arrValue as $key2 => $value2){
                if($key == $key2){
                    $isHidden = true;
                }
            }
        $currentCoffee = Sections::model()->findByPk($key);
        echo '<li dataId="'. $currentCoffee->id .'"';
        if($isHidden == true)
            echo ' style="display: none;"';
        echo '><a href="#" class="addCoffeeToList" dataId="'. $currentCoffee->id .'" dataTitle="'. $currentCoffee->title .'" dataPrice="'. $currentCoffee->price .'">
                <img src="/upload/coffee/' . $currentCoffee->image .'" />
                <div><h3>'. $currentCoffee->title .'</h3></div>
            </a>
            </li>';
    }
    echo '</ul>';
    if($listOfHiddenCoffee == null){
        echo '<blockquote class="emptyListCoffee"><i>Список кофейных напитков пуст. Вы добавили все виды кофейных напитков.</i></blockquote>';
    }
    ?>
    <div style="clear: both;"></div>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
            'size' => 'large',
			'label'=>$model->isNewRecord ? 'Оплатить' : 'Сохранить',
		)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>