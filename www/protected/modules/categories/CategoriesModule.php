<?php

class CategoriesModule extends CWebModule {
    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $endName = Yii::app()->endName;
        $this->setImport(array(
            "categories.models.*",
            "sections.models.*",
            "categories.{$endName}.components.*",
        ));
        Yii::app()->onModuleCreate(new CEvent($this));
    }
}
