<?php

class DefaultController extends LXAController {

    public $defaultAction = 'admin';

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Sections;
        $modelIngredients = new Ingredients;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sections'])) {
            $model->attributes = $_POST['Sections'];
            $model->image = CUploadedFile::getInstance($model, 'image');

            if ($model->image !== null) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/';
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $imgfilename = md5($model->image->name) . '.' . $model->image->extensionName;
                if ($model->image->saveAs($_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/' . $imgfilename)) {
                    Yii::import('application.extensions.image.Image');
                    $image = new Image($_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/' . $imgfilename);
                    $image->resize(300, 480);
                    $image->save();
                }
            } else {
                $imgfilename = "default.jpg";
            }
            $model->image = $imgfilename;
            if ($model->save())
                $this->redirect(array('admin'));
        }
        $model->id = null;
        $model->image = null;
        $modelCategories = Categories::model()->findByPk($model->id);
        $this->render('create', array(
            'model' => $model,
            'modelIngredients' => $modelIngredients,
            'modelCategories' => $modelCategories
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelIngredients = new Ingredients;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Sections'])) {
            $model->attributes = $_POST['Sections'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            if ($model->image !== null) {
                $path = $_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/';
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $imgfilename = md5($model->image->name) . '.' . $model->image->extensionName;
                if ($model->image->saveAs($_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/' . $imgfilename)) {
                    Yii::import('application.extensions.image.Image');
                    $image = new Image($_SERVER['DOCUMENT_ROOT'] . '/upload/coffee/' . $imgfilename);
                    $image->resize(300, 480);
                    $image->save();
                }
            } else {
                $imgfilename = "default.jpg";
            }
            $model->image = $imgfilename;
            if ($model->save())
                $this->redirect(array('admin'));
        }
        $modelCategories = Categories::model()->findByAttributes(array('section_id' => $model->id));
        $this->render('update', array(
            'model' => $model,
            'modelIngredients' => $modelIngredients,
            'modelCategories' => $modelCategories
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
        $model = new Sections('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Sections']))
            $model->attributes = $_GET['Sections'];

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
        $model = Sections::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'sections-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetAllIngredients() {
        $ans = "";
        $arr = $_POST['arr'];
        if($arr != null)
            $arrayOfNOT = explode(',',$arr);
        $model = Ingredients::model()->findAll();
        $iCountElement = $_POST['icount'];

        $ans .= '<div class="control-group">';
            $ans .= "<select name='Ing[$iCountElement]'>";
                $ans .= "<option>";
                $ans .= '--------';
                $ans .= "</option>";

            foreach($model as $key => $value){
                $ifNOT = false;
                if($arr != null)
                    foreach($arrayOfNOT as $key2 => $value2) {
                        if($value->id == $value2){
                            $ifNOT = true;
                        }
                    }
                if($ifNOT == false){
                    $ans .= "<option value='$value->id'>";
                    $ans .= $value->label;
                    $ans .= "</option>";
                }
            }
            $ans .= "</select>";
            $ans .= '<div style="display: inline-block; margin-left: 10px;">
                        <div class="input-append">
                            <input name="IngV[' . $iCountElement . ']" type="text" class="span3" value="" />
                            <span class="add-on">грм</span>
                        </div>
                    </div>
                </div>';
        echo $ans;
    }

}
