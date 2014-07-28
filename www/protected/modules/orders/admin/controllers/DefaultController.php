<?php

class DefaultController extends LXAController {

    public $defaultAction = 'admin';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Orders;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Coffee'])) {
            $arrayOrders = array();
            $totalSum = 0;
            $arrayModCoffee = $_POST['Coffee'];
            foreach($arrayModCoffee as $key => $value){
                $currentSection = Sections::model()->findByPk($key);
                $totalSum += $value*$currentSection->price;
                $arrayOrders[] = array(
                    'section_id' => $key,
                    'count' => $value,
                );
            }
            $strOrders = serialize($arrayOrders);
            if (isset($_POST['Orders'])) {
                $model->attributes = $_POST['Orders'];
                $model->user_id = Yii::app()->user->id;
                $model->point_id = Yii::app()->user->getState('pointId');
                $model->date = date("Y-m-d H:i:s");
                $model->orders = $strOrders;
                $model->total = $totalSum;
                if ($model->save())
                    $this->redirect(array('admin'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Coffee'])) {
            $arrayOrders = array();
            $totalSum = 0;
            $arrayModCoffee = $_POST['Coffee'];
            foreach($arrayModCoffee as $key => $value){
                $currentSection = Sections::model()->findByPk($key);
                $totalSum += $value*$currentSection->price;
                $arrayOrders[] = array(
                    'section_id' => $key,
                    'count' => $value,
                );
            }
            $strOrders = serialize($arrayOrders);
            if (isset($_POST['Orders'])) {
                $model->attributes = $_POST['Orders'];
                $model->user_id = Yii::app()->user->id;
                $model->point_id = Yii::app()->user->getState('pointId');
                $model->date = date("Y-m-d H:i:s");
                $model->orders = $strOrders;
                $model->total = $totalSum;
                if ($model->save())
                    $this->redirect(array('admin'));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        /*
        $arrOrder = array(
            array(
                'section_id' => 1,
                'count' => 5,
            ),
            array(
                'section_id' => 5,
                'count' => 3,
            )
        );
        $arrVal = serialize($arrOrder);
        $ord = Orders::model()->findByPk(3);
        $ord->orders = $arrVal;
        $ord->update(array('orders'));
        //CVarDumper::dump($arrVal,1,1); die;

        $value = 'a:1:{i:0;a:2:{s:10:\"section_id\";i:1;s:5:\"count\";i:5;}}';
        $arr = unserialize($arrVal);
        //CVarDumper::dump($arr,1,1); die;
        */

        $model = new Orders('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Orders']))
            $model->attributes = $_GET['Orders'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Orders::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'orders-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
