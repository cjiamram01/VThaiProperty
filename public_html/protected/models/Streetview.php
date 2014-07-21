<?php

/**
 * This is the model class for table "tbl_streetview".
 *
 * The followings are the available columns in table 'tbl_streetview':
 * @property string $id
 * @property string $title
 * @property string $property_id
 * @property string $originalimage
 * @property double $worldSizeX
 * @property double $worldSizeY
 * @property double $tileSizeX
 * @property double $tileSizeY
 * @property string $lat
 * @property string $lng
 * @property string $panoID
 */
class Streetview extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_streetview';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id,order_no,worldSizeX, worldSizeY, tileSizeX, tileSizeY,headingRef,LinkTo_Id,property_id', 'numerical'),
			array('title, lat, lng', 'length', 'max'=>45),
			array('property_id, panoID', 'length', 'max'=>20),
			//array('originalimage', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, property_id, originalimage, worldSizeX, worldSizeY, tileSizeX, tileSizeY, lat, lng, panoID, order_no', 'safe', 'on'=>'search'),
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
			'title' => Yii::t('app','Title'),
			'property_id' => Yii::t('app','Property'),
			'originalimage' => Yii::t('app','Originalimage'),
			'worldSizeX' => Yii::t('app','World Size X'),
			'worldSizeY' => Yii::t('app','World Size Y'),
			'tileSizeX' => Yii::t('app','Tile Size X'),
			'tileSizeY' => Yii::t('app','Tile Size Y'),
			'lat' => Yii::t('app','Lat'),
			'lng' => Yii::t('app','Lng'),
			'panoID' => Yii::t('app','Pano'),
			'order_No' => Yii::t('app','Order No'),
			'headingRef' => Yii::t('app','Heading'),
			'LinkTo_Id' => Yii::t('app','Point Link'),

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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('property_id',$this->property_id,true);
		$criteria->compare('originalimage',$this->originalimage,true);
		$criteria->compare('worldSizeX',$this->worldSizeX);
		$criteria->compare('worldSizeY',$this->worldSizeY);
		$criteria->compare('tileSizeX',$this->tileSizeX);
		$criteria->compare('tileSizeY',$this->tileSizeY);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
		$criteria->compare('panoID',$this->panoID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Streetview the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
