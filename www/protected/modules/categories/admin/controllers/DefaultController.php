<?php

class DefaultController extends LXAController {

    public $defaultAction = 'admin';

    public $CQtreeGreedView = array(
        'modelClassName' => 'Categories', //название класса
        'adminAction' => 'admin' //action, где выводится QTreeGridView. Сюда будет идти редирект с других действий.
    );

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Categories;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Categories'])) {
            $model->attributes = $_POST['Categories'];
            if ($model->saveNode()) {
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

        if (isset($_POST['Categories'])) {
            $model->attributes = $_POST['Categories'];

            $model->background = CUploadedFile::getInstance($model, 'background');
            if ($model->saveNode()) {
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
            $this->loadModel($id)->deleteNode();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($lang = 'ru') {
        $model = new Categories('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Categories']))
            $model->attributes = $_GET['Categories'];

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
        $model = Categories::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'categories-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionMove($id, $type) {
        $model = Categories::model()->findByPk((int)$id);

        if ($model === null) {
            throw new CHttpException(404, 'Страница не найдена');
        }

        if (!$model->isRoot()) {
            if ($type == 'up') {
                $prev = $model->prev()->find();
                if ($prev !== null) {
                    $model->moveBefore($prev);
                }
            } else {
                $next = $model->next()->find();
                if ($next !== null) {
                    $model->moveAfter($next);
                }
            }
        } else {
            $curPos = $model->root;
            if ($type == 'up') {
                $prevCriteria = new CDbCriteria;
                $prevCriteria->compare('lang_id', $model->lang_id);
                $prevCriteria->compare('section_id', $model->section_id);
                $prevCriteria->compare('root', '<' . $model->root);
                $prevCriteria->compare('parent_id', 0);
                $prevCriteria->order = 'root DESC';
                $prevCategory = Categories::model()->find($prevCriteria);


                if ($prevCategory !== null) {
                    $newPos = $prevCategory->root;

                    $allDescendantsCurModel = $model->descendants()->findAll();
                    $allDescendantsPrevModel = $prevCategory->descendants()->findAll();


                    foreach ($allDescendantsCurModel as $curItem) {
                        $curItem->root = $newPos;
                        $curItem->saveNode(false);
                    }

                    $model->root = $newPos;
                    $model->saveNode(false);

                    foreach ($allDescendantsPrevModel as $prevItem) {
                        $prevItem->root = $curPos;
                        $prevItem->saveNode();
                    }

                    $prevCategory->root = $curPos;
                    $prevCategory->saveNode();
                }

            } else {
                $nextCriteria = new CDbCriteria;
                $nextCriteria->compare('lang_id', $model->lang_id);
                $nextCriteria->compare('section_id', $model->section_id);
                $nextCriteria->compare('root', '>' . $model->root);
                $nextCriteria->compare('parent_id', 0);
                $nextCriteria->order = 'root ASC';
                $nextCategory = Categories::model()->find($nextCriteria);


                if ($nextCriteria !== null) {
                    $newPos = $nextCategory->root;

                    $allDescendantsCurModel = $model->descendants()->findAll();
                    $allDescendantsNextModel = $nextCategory->descendants()->findAll();


                    foreach ($allDescendantsCurModel as $curItem) {
                        $curItem->root = $newPos;
                        $curItem->saveNode(false);
                    }

                    $model->root = $newPos;
                    $model->saveNode();

                    foreach ($allDescendantsNextModel as $prevItem) {
                        $prevItem->root = $curPos;
                        $prevItem->saveNode();
                    }

                    $nextCategory->root = $curPos;
                    $nextCategory->saveNode();
                }

            }
        }
        $this->redirect(array('admin', 'lang' => $model->lang->code));
    }
}
