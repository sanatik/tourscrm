<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class LXController extends RController {

    public $layout = '//layouts/main';
    public $keyword;

    private static $_lang_id;

    public function filters() {
        return array(
            'rights'
        );
    }

    public static function getLangId() {
        if (empty(self::$_lang_id)) {
            $criteria = new CDbCriteria;
            $criteria->compare('code', Yii::app()->language);
            $lang = Langs::model()->find($criteria);
            self::$_lang_id = $lang->id;
        }

        return self::$_lang_id;
    }

    public function setPageTitle($title) {
        return $this->pageTitle = Yii::app()->name . ' - ' . $title;
    }

    public function sendMail($subject, $text, $from = false, $to = false, $alt = 'main') {
        $content = $text;

        $mail_params['main'] = Yii::app()->params['mail'];
        $mail_params['alt0'] = Yii::app()->params['mail_alt0'];
        $mail_params['alt1'] = Yii::app()->params['mail_alt1'];
        $mail_params['alt2'] = Yii::app()->params['mail_alt2'];


        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $SM = Yii::app()->swiftMailer;
        spl_autoload_register(array('YiiBase', 'autoload'));

        $transport = $SM->smtpTransport('mail.softdeco.net', 25, null,
            'e.dymov@softdeco.com', 'Kai1eif7');


        $mailer = $SM->mailer($transport);


        $Message = $SM->newMessage($subject)
            ->setFrom($from)
            ->setTo($to)
            ->addPart($content, 'text/html')
            ->setBody($content);

        $result = $mailer->send($Message);
    }

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);
        // If there is a post-request, redirect the application to the provided url of the selected language
        if (isset($_POST['language'])) {
            $lang = $_POST['language'];
            $MultilangReturnUrl = $_POST[$lang];
            $this->redirect($MultilangReturnUrl);
        }
        // Set the application language if provided by GET, session or cookie
        if (isset($_GET['language'])) {
            Yii::app()->language = $_GET['language'];
            Yii::app()->user->setState('language', $_GET['language']);
            $cookie = new CHttpCookie('language', $_GET['language']);
            Yii::app()->request->cookies['language'] = $cookie;
        } elseif (Yii::app()->user->hasState('language')) {
            Yii::app()->language = Yii::app()->user->getState('language');
        } elseif (isset(Yii::app()->request->cookies['language'])) {
            Yii::app()->language = Yii::app()->request->cookies['language']->value;
        }

        // CVarDumper::dump($this->getModule()->getController(),10,1);
    }

    public function createMultilanguageReturnUrl($lang = 'ru') {
        if (count($_GET) > 0) {
            $arr = $_GET;
            $arr['language'] = $lang;
        } else
            $arr = array('language' => $lang);
        return $this->createUrl('', $arr);
    }

    public function getRoute() {
        if (($action = $this->getAction()) !== null)
            return '/' . Yii::app()->language . '/' . $this->getUniqueId() . '/' . $action->getId();
        else
            return '/' . Yii::app()->language . '/' . $this->getUniqueId();
    }
    public function setKeyword($keywords)
    {
        foreach($keywords as $keyword)
            $this->keyword .= $keyword->tag." ";
    }
}