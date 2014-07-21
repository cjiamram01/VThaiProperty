<?php

/**
 * This is the model class for table "tbl_customers".
 *
 * The followings are the available columns in table 'tbl_customers':
 * @property string $id
 * @property string $customername
 * @property string $description
 * @property integer $customertype_id
 * @property string $email
 * @property string $tel
 * @property integer $user_id
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customertype_id', 'required'),
			//array('customertype_id, user_id', 'numerical', 'integerOnly'=>true),
			array('customertype_id', 'numerical', 'integerOnly'=>true),
			array('customername, description, email, tel', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customername, description, customertype_id, email, tel', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('app','ID'),
			'customername' => Yii::t('app','Customername'),
			'description' => Yii::t('app','Description'),
			'customertype_id' => Yii::t('app','Customertype'),
			'email' => Yii::t('app','Email'),
			'tel' => Yii::t('app','Tel'),
			//'user_id' => Yii::t('app','User'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('customername',$this->customername,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('customertype_id',$this->customertype_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('tel',$this->tel,true);
		//$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
