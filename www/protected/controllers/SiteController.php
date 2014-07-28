<?php

class SiteController extends LXController {

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/second';
        if ($error = Yii::app()->errorHandler->error) {
            $this->pageTitle=Yii::app()->name . ' - Error';
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', array('error' => $error));
        }
    }
}