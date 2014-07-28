<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ugeen Alex
 * Date: 01.06.12
 * Time: 16:03
 * To change this template use File | Settings | File Templates.
 */
class lxLogsFilter extends CFilter {
    public $actions = '*,all';


    public function preFilter($filterChain) {
        /*$this->actions = trim(strtoupper($this->actions));
        // если экшн обрабатывать нет необходимости - просто выходим из фильтра
        if ($this->actions != '*' && $this->actions != 'ALL' && !in_array($filterChain->action->id, explode(',', $this->actions))) {
            return true;
        } */

        $log = new Logs;

        $log->post = CJSON::encode($_POST);
        $log->get = CJSON::encode($_GET);
        $log->request = CJSON::encode($_REQUEST);
        $log->server = CJSON::encode($_SERVER);
        $log->url = $_SERVER['REQUEST_URI'];
        $log->ip = Yii::app()->request->getUserHostAddress();
        $log->session_data = CJSON::encode(Yii::app()->session);

        $log->save();
        return parent::preFilter($filterChain);
    }

    protected function postFilter($filterChain) {
        // logic being applied after the action is executed
    }


}
