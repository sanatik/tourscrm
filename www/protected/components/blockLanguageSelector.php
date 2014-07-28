<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ugeen Alex
 * Date: 10.05.12
 * Time: 14:21
 * To change this template use File | Settings | File Templates.
 */
class blockLanguageSelector extends CWidget {

    public function run() {
        $currentLang = Yii::app()->language;
        $languages = Yii::app()->params->languages;
        $this->render('languageSelector', array('currentLang' => $currentLang, 'languages' => $languages));
    }
}