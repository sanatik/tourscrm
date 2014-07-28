<?php

/**
 * This is the model class for table "{{sections}}".
 *
 * The followings are the available columns in table '{{sections}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property string $image
 */
class Sections extends CActiveRecord {
    private static $_items;
    public $delete_image = 0;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Sections the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sections}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, description, price', 'required'),
            array('title, image', 'length', 'max' => 255),
            array('delete_image, price', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, description, price, image', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'categories' => array(self::BELONGS_TO, 'Categories', 'section_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'price' => 'Цена',
            'image' => 'Изображение',
            'delete_image' => 'Удалить изображение',
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
        $criteria->compare('description', $this->description);
        $criteria->compare('price', $this->price);
        $criteria->compare('image', $this->image);

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

    protected function afterSave()
    {
        /**
         * If new records to save in DB
         */
        $arrayIngresients = array();
        $ingredientsKey = $_POST['Ing'];
        $ingredientsValue = $_POST['IngV'];
        $amountIngredients = sizeof($ingredientsKey);

        for($i = 0; $i < $amountIngredients; $i++){
            $arrayIngresients[] = array(
                'ingredient_id' => $ingredientsKey[$i],
                'total' => $ingredientsValue[$i],
            );
        }
        $arr = serialize($arrayIngresients);
        $category = Categories::model()->findByAttributes(array('section_id' => $this->id));
        if($category == null){
            $category = new Categories;
            $category->section_id = $this->id;
            $category->values = $arr;
            $category->save();
        }
        /**
         * If old records to save in DB
         */
        $arrayOldIngresients = array();
        $ingredientsOld = $_POST['IngOld'];
        if($ingredientsOld != null){
            foreach($ingredientsOld as $key => $value){
                $arrayOldIngresients[] = array(
                    'ingredient_id' => $key,
                    'total' => $value,
                );
            }
            $arrOld = serialize($arrayOldIngresients);
            $categoryOld = Categories::model()->findByAttributes(array('section_id' => $this->id));
            $categoryOld->values = $arrOld;
            $categoryOld->update(array('values'));
        }
    }

    /*
    public function beforeValidate() {
        if ($this->delete_image == 1) {
            $this->image = '';
        }
    }
    */

}