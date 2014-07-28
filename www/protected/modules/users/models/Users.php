<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $username2
 * @property string $password2
 * @property string $email
 * @property string $last_login
 * @property integer $active
 */
class Users extends CActiveRecord {
    private static $_items;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, email, password, username2, password2', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('username, password, username2, password2', 'length', 'max' => 50),
            array('email', 'email'),
            array('data_name, last_login', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, password, username2, password2, email, last_login, active', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'username2' => 'Имя пользователя(2)',
            'password2' => 'Пароль(2)',
            'email' => 'E-mail',
            'last_login' => 'Последний визит',
            'active' => 'Активность',
            'old_password' => 'Старый пароль'
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('username2', $this->username, true);
        $criteria->compare('password2', $this->password, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getListItems() {
        if (empty(self::$_items)) {
            $model = self::model()->findAll();
            self::$_items = CHtml::listData($model, 'id', 'username');
        }
        return self::$_items;
    }

}