<?php

/**
 * This is the model class for table "{{clients}}".
 *
 * The followings are the available columns in table '{{clients}}':
 * @property integer $id
 * @property string $name
 * @property string $phones
 * @property string $email
 * @property integer $isSendStatus
 * @property integer $isSubscribe
 * @property string $cameFrom
 * @property string $typeOfClient
 */
class Clients extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Clients the static model class
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
        return '{{clients}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('isSendStatus, isSubscribe', 'numerical', 'integerOnly'=>true),
            array('name, phones, email, cameFrom, typeOfClient', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, phones, email, isSendStatus, isSubscribe, cameFrom, typeOfClient', 'safe', 'on'=>'search'),
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
            'name' => 'Имя',
            'phones' => 'Контактные телефоны(через запятую)',
            'email' => 'Email',
            'isSendStatus' => 'Не отправлять статус заявки',
            'isSubscribe' => 'Не отправлять рассылку',
            'cameFrom' => 'cameFrom',
            'typeOfClient' => 'Клиент'
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
        $criteria->compare('name',$this->name,true);
        $criteria->compare('phones',$this->phones,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('typeOfClient',$this->typeOfClient,true);
        $criteria->compare('cameFrom',$this->cameFrom,true);
        $criteria->compare('isSendStatus',$this->isSendStatus);
        $criteria->compare('isSubscribe',$this->isSubscribe);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    
    public function listClients(){
        $model = Clients::model()->findAll();
        return CHtml::listData($model, "id", "name");
    }
}
