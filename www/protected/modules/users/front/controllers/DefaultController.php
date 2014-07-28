<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luxorka
 * Date: 12.12.12
 * Time: 15:47
 * To change this template use File | Settings | File Templates.
 */
class DefaultController extends LXController {


    public $layout = '//layouts/timetable';
    public function actions() {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
            ),
        );
    }

    /*public function actionLogin() {

        $service = Yii::app()->request->getQuery('service');
        if (isset($service)) {
            $authIdentity = Yii::app()->eauth->getIdentity($service);
            $authIdentity->redirectUrl = Yii::app()->user->returnUrl;
            $authIdentity->cancelUrl = $this->createAbsoluteUrl('/users/default/login');

            if ($authIdentity->authenticate()) {
                $identity = new EAuthUserIdentity($authIdentity);

                // successful authentication
                if ($identity->authenticate()) {
                    Yii::app()->user->login($identity);
                    // special redirect with closing popup window
                    $authIdentity->redirect();
                }
                else {
                    // close popup window and redirect to cancelUrl
                    $authIdentity->cancel();
                }
            }

            // Something went wrong, redirect to login page
            $this->redirect(array('/users/default/login'));
        }

        $this->render('login_form', array('model' => $model));
    }*/

    public function actionLogin() {
        $this->pageTitle = 'Вход на сайт';

        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }

        $this->render('login_form', array('model' => $model));
    }

    public function actionProfile() {
        $this->pageTitle = 'Профиль';

        $model = new ProfileForm;

		$user = Users::model()->findByPk(Yii::app()->user->id);
        if (isset($_POST['ProfileForm'])) {
            $model->attributes = $_POST['ProfileForm'];

            if ($model->saveProfile()) {
                $this->redirect(array('profile'));
            }
        }

        $this->render('profileForm', array('model' => $model, 'user' => $user));
    }
	
	public function actionEditProfile(){
        $this->pageTitle = 'Изменение профиля';

        $model = new ProfileForm;
		$user = Users::model()->findByPk(Yii::app()->user->id);
		$model->data_name = $user->data_name;
		$model->user_type = $user->data_user_type;
		$model->is_gov = $user->data_is_gov;
		$model->email = $user->email;
		$model->bin = $user->data_bin;
		$model->user_type = $user->data_user_type;
		if(isset($_POST['ProfileForm'])){
		
			$model->attributes = $_POST['ProfileForm'];
			
			if($model->saveProfile()){
				Yii::app()->user->setFlash('success', Yii::t('users','Ваши данные успешно изменены'));
				$this->redirect(array('EditProfile'));
			}
		}
	
		$this->render('edit_profile', array('model' => $model));
	}
	
	

    public function actionRegistration() {
        $this->pageTitle = 'Регистрация';

        $model = new RegistrationForm;

        if (isset($_POST['RegistrationForm'])) {
            $model->attributes = $_POST['RegistrationForm'];

            if ($model->registration()) {
                $this->redirect(array('successRegistration'));
            }
        }

        $this->render('registration_form', array('model' => $model));
    }

    public function actionSuccessRegistration() {
        $this->pageTitle = 'Регистрация завершена';

        $this->render('successRegistration');
    }

    public function actionLogout() {
        Yii::app()->user->logout();

        $this->redirect(array('/'));
    }

    public function actionChangePassword() {
        $this->pageTitle = 'Изменение пароля';

        $model = new ChangePasswordForm;

        if (isset($_POST['ChangePasswordForm'])) {
            $model->attributes = $_POST['ChangePasswordForm'];

			
            if ($model->changePassword()) {
                $this->redirect(array('profile'));
            }
        }

        $this->render('changePassword', array('model' => $model));
    }
	
	public function actionMyOrders(){
        $this->pageTitle = 'Мои заказы';

        $criteria = new CDbCriteria;
		$criteria->compare('user_id', Yii::app()->user->id);
		
		$data_provider = new CActiveDataProvider('Orders', array(
            'criteria' => $criteria,
        ));
		
		$this->render('orders', array('data_provider' => $data_provider));
	}
	
	

}
