<?php

class DefaultController extends LXController {

    public $layout = '//layouts/timetable';



    public function actionIndex($query = '', $type = 1) {
        $this->pageTitle = Yii::t('search', 'Поиск');

        $query = strip_tags($query);

        if ($query != '' || strlen($query) > 3) {
            if ($type == 1) {
                $criteria = new CDbCriteria;
                $criteria->addCondition('`text` LIKE :query OR `title` LIKE :query1 OR short_text LIKE :query2');
                $criteria->params[':query'] = '%' . $query . '%';
                $criteria->params[':query1'] = '%' . $query . '%';
                $criteria->params[':query2'] = '%' . $query . '%';
                $criteria->compare('lang_id', LXController::getLangId());
                $criteria->compare('active', '1');

                $programModel = ProgrammsContent::getSearchPages($criteria, $query);

                $criteria->order = 'date DESC, time DESC';
                $model = Pages::getSearchPages($criteria, $query);

                $searchDataProvider = new CArrayDataProvider(CMap::mergeArray($model, $programModel), array(
                    'pagination' => array('pageSize' => 5)
                ));

                $query = htmlspecialchars($query, ENT_QUOTES);

                if (empty($model)) {
                    $this->render('noResults', array('query' => $query));
                } else {
                    $this->render('results', array('query' => $query, 'results' => $searchDataProvider));
                }
            } else {
                $this->redirect($this->createUrl('/shop/default/search/', array('ShopSearchForm[title]' => $query)));
            }
        } else {
            $this->render('searchForm', array('query' => $query));
        }
    }}