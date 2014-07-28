<?php

/**
 * This is the model class for table "{{langs}}".
 *
 * The followings are the available columns in table '{{langs}}':
 * @property integer $id
 * @property string $title
 * @property string $code
 */
class Langs extends CActiveRecord {

    private static $_items;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Langs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{langs}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'length', 'max' => 255),
            array('code', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, code', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'code' => 'Code',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('code', $this->code, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function getListItems() {
        if (empty(self::$_items)) {
            $model = self::model()->findAll();

            self::$_items = CHtml::listData($model, 'id', 'title');
        }

        return self::$_items;
    }

    public static function getLangIdByCode($lang) {

        $model = self::model()->find('code=:code', array(':code' => $lang));

        if ($model !== null) {
            return $model->id;
        }


        return 1;
    }
}