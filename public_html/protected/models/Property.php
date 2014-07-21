<?php

/**
 * This is the model class for table "tbl_property".
 *
 * The followings are the available columns in table 'tbl_property':
 * @property string $id
 * @property string $picture
 * @property string $title
 * @property string $description
 * @property string $lat
 * @property string $lng
 * @property string $floor
 * @property string $room
 * @property integer $garage
 * @property integer $restroom
 * @property double $area
 * @property string $project_provider
 * @property integer $swiming_pool
 * @property string $residentailtype_id
 * @property integer $Project_id
 * @property string $customers_id
 */
class Property extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('residentailtype_id, Project_id, customers_id', 'required'),
			array('residentailtype_id', 'required'),
			array('garage, restroom, swiming_pool, Project_id', 'numerical', 'integerOnly'=>true),
			array('area', 'numerical'),
			array('picture', 'length', 'max'=>200),
			array('title, description, project_provider', 'length', 'max'=>100),
			array('lat, lng, residentailtype_id, customers_id', 'length', 'max'=>20),
			array('floor, room', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,title, description,floor, room, garage, restroom, area, swiming_pool, residentailtype_id', 'safe', 'on'=>'search'),
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

						'residentailtype' => array(self::BELONGS_TO, 'Residentailtype', 'residentailtype_id'),


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'picture' => Yii::t('app','Picture'),
			'title' => Yii::t('app','Title'),
			'description' => Yii::t('app','Description'),
			'lat' => Yii::t('app','Latitude'),
			'lng' => Yii::t('app','Longtitude'),
			'floor' => Yii::t('app','Floor'),
			'room' => Yii::t('app','Room'),
			'garage' => Yii::t('app','Garage'),
			'restroom' => Yii::t('app','Restroom'),
			'area' => Yii::t('app','Area'),
			'project_provider' => Yii::t('app','Project Provider'),
			'swiming_pool' => Yii::t('app','Swiming Pool'),
			'residentailtype_id' => Yii::t('app','Residentailtype'),
			'Project_id' => Yii::t('app','Project'),
			'customers_id' => Yii::t('app','Customers'),
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

		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('picture',$this->picture,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
		$criteria->compare('floor',$this->floor,true);
		$criteria->compare('room',$this->room,true);
		$criteria->compare('garage',$this->garage);
		$criteria->compare('restroom',$this->restroom);
		$criteria->compare('area',$this->area);
		$criteria->compare('project_provider',$this->project_provider,true);
		$criteria->compare('swiming_pool',$this->swiming_pool);
		$criteria->compare('residentailtype_id',$this->residentailtype_id,true);
		//$criteria->compare('Project_id',$this->Project_id);
		//$criteria->compare('customers_id',$this->customers_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
