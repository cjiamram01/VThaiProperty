<?php

/**
 * This is the model class for table "tbl_pointlink".
 *
 * The followings are the available columns in table 'tbl_pointlink':
 * @property string $id
 * @property string $Streetview_id
 * @property string $title
 * @property double $angle
 * @property string $pano_LinkID
 */
class Pointlink extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pointlink';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Streetview_id', 'required'),
			array('angle,pano_LinkID,Streetview_id', 'numerical'),
			array('Streetview_id,pano_LinkID', 'length', 'max'=>20),
			array('title', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Streetview_id, title, angle, pano_LinkID', 'safe', 'on'=>'search'),
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
			'Streetview_id' => Yii::t('app','Streetview'),
			'title' => Yii::t('app','Title'),
			'angle' => Yii::t('app','Angle'),
			'pano_LinkID' => Yii::t('app','Pano Link'),
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
		$criteria->compare('Streetview_id',$this->Streetview_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('angle',$this->angle);
		$criteria->compare('pano_LinkID',$this->pano_LinkID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pointlink the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
