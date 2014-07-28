<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Фарух
 * Date: 17.01.13
 * Time: 17:51
 * To change this template use File | Settings | File Templates.
 */

class MenuWithChildWidget extends CWidget {
    public $section_id;



    public function run() {
        $roots = Categories::model()->findAllByAttributes(array('parent_id' => $this->section_id));

        $items = array();


        foreach ($roots as $root) {
            $items += $root->getCMenuArray(array(
                'returnrootnode' => true,
                'rootaslink' => true,
                'condition' => "lang_id='" . LXController::getLangId() . "' AND",
                'url' => '/pages/default/telecompanyView'
            ));
        }

        $this->render('menuWithChildWidget', array('items' => $items));
    }

}
