<?php

class BlockWidjet extends CWidget {


    public function run() {
        $model = Users::model()->findByPk(Yii::app()->user->id);
		      
		$this->render('//BlockWidjet/view', array('model' => $model));
    }
}
