<?php

class DefaultController extends LXAController {

    public $defaultAction = 'admin';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Users;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $model->password = $this->getModule()->hashPassword($model->password);

            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $model->password = '';
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
        $oldPassword = $model->password;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];

            if ($model->password=='') {
                $model->password = $oldPassword;
            } else {
                $model->password = $this->getModule()->hashPassword($model->password);
            }
            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $model->password = '';
        $model->password2 = '';

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
        $model = new Users('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];

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
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLogin() {
        $validate = false;
        $modelRight1 = new LoginForm1;
        $modelRight2 = new LoginForm2;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($modelRight1);
            Yii::app()->end();
        }
        if($validate == false)
            if (isset($_POST['LoginForm2'])) {
                $modelRight2->attributes = $_POST['LoginForm2'];
                if ($modelRight2->validate() && $modelRight2->login()){
                    $this->render('login', array('model' => $modelRight1));
                    $validate = true;
                }
            }

            if (isset($_POST['LoginForm1'])) {
                $modelRight1->attributes = $_POST['LoginForm1'];
                if($modelRight1->validate() && $modelRight1->login()){
                    $this->redirect(Yii::app()->user->returnUrl);
                } else {
                    Yii::app()->user->logout();
                }
            }
        if($validate == false)
            $this->render('login2', array('model' => $modelRight2));
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }
}
