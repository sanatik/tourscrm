<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Фарух
 * Date: 17.01.13
 * Time: 17:51
 * To change this template use File | Settings | File Templates.
 */

class ProgrammCategories extends CWidget {
    public $id;



    public function run() {
        $roots = ProgrammsCategories::model()->findAllByAttributes(array('parent_id' => $this->id));

        $items = array();


        foreach ($roots as $root) {
            $items += $root->getCMenuArray(array(
                'returnrootnode' => true,
                'rootaslink' => true,
                'condition' => "lang_id='" . LXController::getLangId() . "' AND",
                'url' => '/programms/default/ajaxView'
            ));
        }

        $this->render('programm_categories', array('items' => $items));
    }

}
