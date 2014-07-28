<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luxorka
 * Date: 11.12.12
 * Time: 11:51
 * To change this template use File | Settings | File Templates.
 */
class BlockLogin extends CWidget {


    public function run() {
        $model = new LoginForm;

        if (Yii::app()->user->isGuest) {
            $this->render('//BlockLogin/loginForm', array('model' => $model));
        } else {
            $this->render('//BlockLogin/profile');
        }
    }
}
