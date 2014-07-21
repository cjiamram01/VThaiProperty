<?php

/**
 * This is the model class for table "dataprovince".
 *
 * The followings are the available columns in table 'dataprovince':
 * @property integer $PROVINCE_ID
 * @property string $PROVINCE_CODE
 * @property string $PROVINCE_NAME
 * @property string $PROVINCE_NAME_ENG
 * @property integer $GEO_ID
 */
class province extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dataprovince';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PROVINCE_CODE, PROVINCE_NAME, PROVINCE_NAME_ENG', 'required'),
			array('GEO_ID', 'numerical', 'integerOnly'=>true),
			array('PROVINCE_CODE', 'length', 'max'=>2),
			array('PROVINCE_NAME, PROVINCE_NAME_ENG', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PROVINCE_ID, PROVINCE_CODE, PROVINCE_NAME, PROVINCE_NAME_ENG, GEO_ID', 'safe', 'on'=>'search'),
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
			'PROVINCE_ID' => Yii::t('app','Province'),
			'PROVINCE_CODE' => Yii::t('app','Province Code'),
			'PROVINCE_NAME' => Yii::t('app','Province Name'),
			'PROVINCE_NAME_ENG' => Yii::t('app','Province Name Eng'),
			'GEO_ID' => Yii::t('app','Geo'),
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

		$criteria->compare('PROVINCE_ID',$this->PROVINCE_ID);
		$criteria->compare('PROVINCE_CODE',$this->PROVINCE_CODE,true);
		$criteria->compare('PROVINCE_NAME',$this->PROVINCE_NAME,true);
		$criteria->compare('PROVINCE_NAME_ENG',$this->PROVINCE_NAME_ENG,true);
		$criteria->compare('GEO_ID',$this->GEO_ID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return province the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
