<?php

/**
 * This is the model class for table "{{bids}}".
 *
 * The followings are the available columns in table '{{bids}}':
 * @property integer $id
 * @property integer $client_id
 * @property string $type
 * @property string $country
 * @property integer $amount
 * @property string $childs
 * @property integer $amountOfNights
 * @property string $budget
 * @property string $bidSource
 * @property string $comment
 */
class Bids extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bids the static model class
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
		return '{{bids}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, type, country, amount, childs, amountOfNights, budget, bidSource, comment', 'required'),
			array('client_id, amount, amountOfNights', 'numerical', 'integerOnly'=>true),
			array('type, country, childs, budget, bidSource', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, client_id, type, country, amount, childs, amountOfNights, budget, bidSource, comment', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_id' => 'Клиент',
			'type' => 'Тип заявки',
			'country' => 'Страна/город/отель',
			'amount' => 'Количество человек',
			'childs' => 'Количество детей(лет)',
			'amountOfNights' => 'Количество ночей',
			'budget' => 'Бюджет',
			'bidSource' => 'Источник заявки',
			'comment' => 'Комментарий',
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
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('childs',$this->childs,true);
		$criteria->compare('amountOfNights',$this->amountOfNights);
		$criteria->compare('budget',$this->budget,true);
		$criteria->compare('bidSource',$this->bidSource,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}