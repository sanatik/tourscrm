<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luxorka
 * Date: 30.11.12
 * Time: 15:38
 * To change this template use File | Settings | File Templates.
 */
class MainMenuWidget extends CWidget {
    public $sectionId;
    public $url = '/pages/default/category';

    public function run() {
        $criteria = new CDbCriteria;
        $criteria->order = 'root ASC, lft';
        $criteria->condition = 'lang_id=:lang_id AND section_id=:section_id';
        $criteria->params = array(':section_id' => (int)$this->sectionId,
            ':lang_id' => LXController::getLangId());
        $roots = Categories::model()->roots()->findAll($criteria);

        $items = array();

        foreach ($roots as $root) {
            $items += $root->getCMenuArray(array(
                'returnrootnode' => true,
                'rootaslink' => true,
                'condition' => "lang_id='" . LXController::getLangId() . "' AND",
                'url' => $this->url
            ));
        }

        $this->render('mainMenuWidget', array('items' => $items));
    }

}
