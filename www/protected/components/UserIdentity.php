<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    private $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate2() {
        $model = Users::model()->find('username2=:username', array(':username' => $this->username));
        if ($model === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!Yii::app()->getModule('users')->validatePassword($model->password2, $this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $model->id;
            Yii::app()->user->setState('userId', $this->id);
            $this->setState('username', $model->username);
        }

        return !$this->errorCode;
    }

    public function authenticate() {
        
        $model = Users::model()->find('username=:username', array(':username' => $this->username));
        if ($model === null){
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }else if (!Yii::app()->getModule('users')->validatePassword($model->password, $this->password)){
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }else {
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $model->id;
            $this->setState('username', $model->username);
        }
        return $this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}
