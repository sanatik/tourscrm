<?php

class SearchModule extends CWebModule {
    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        parent::init();
        Yii::app()->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'search/default/error',
            ),
        ));
        // import the module-level models and components
        $endName = Yii::app()->endName;
        $this->setImport(array(
            "sections.models.*",
            "categories.models.*",
            "pages.models.*",
            "search.{$endName}.components.*",
        ));
        Yii::app()->onModuleCreate(new CEvent($this));
    }


}
