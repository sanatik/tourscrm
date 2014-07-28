<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class LXAController extends RController {
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    private static $_sections;

    public function filters() {
        return array(
            'rights'
        );
    }

    public function init() {
        parent::init();
    }

    public static function getSectionMenu() {
        if (empty(self::$_sections)) {
            $criteria = new CDbCriteria;
            $criteria->order = 'id ASC';
            $model = Sections::model()->findAll($criteria);

            foreach ($model as $item) {
                self::$_sections[] = array(
                    'label' => 'В разделе ' . $item->title,
                    'url' => Yii::app()->createUrl('/categories/default/admin', array('section' => $item->id))
                );
            }
        }

        return self::$_sections;
    }

}