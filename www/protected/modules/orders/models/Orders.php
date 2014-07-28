<?php

/**
 * This is the model class for table "{{orders}}".
 *
 * The followings are the available columns in table '{{orders}}':
 * @property integer $id
 * @property integer $point_id
 * @property integer $user_id
 * @property string $name
 * @property string $orders
 * @property integer $total
 * @property string $date
 */
class Orders extends CActiveRecord
{
    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{orders}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('point_id, user_id, name, total, date', 'required'),
			array('point_id, user_id, total', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, point_id, user_id, name, orders, total, date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
            'point' => array(self::BELONGS_TO, 'Points', 'point_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'point_id' => 'Точка',
			'user_id' => 'Бариста',
			'name' => 'Имя(тел.)',
			'orders' => 'Заказ',
			'total' => 'Сумма',
            'date' => 'Дата'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('point_id',$this->point_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name);
		$criteria->compare('orders',$this->orders);
		$criteria->compare('total',$this->total);
		$criteria->compare('date',$this->date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>array(
                'defaultOrder'=>'date DESC',
            ),
		));
	}

}