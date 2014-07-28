<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Фарух
 * Date: 27.02.13
 * Time: 12:36
 * To change this template use File | Settings | File Templates.
 */
class BrandFonWidget extends CWidget
{

    public function run()
    {
        $category = Categories::model()->findByAttributes(array('sefname' => 'main', 'lang_id' => LXController::getLangId()));

        $this->render('brand_fon_widget', array('category' => $category));
    }
}
