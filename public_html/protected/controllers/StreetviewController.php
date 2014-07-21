<?php

class StreetviewController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';


	public function getDefaultPanoId()
	{
		
		$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		

		 $panoId=Yii::app()->db
         ->createCommand("SELECT panoID FROM tbl_streetview")
         ->where('property_id=:property_id and order_no=1', array(':property_id'=>$property_id))
         ->queryScalar();

		return $panoId;

	}

	public function getDefaultHeading()
	{
		
		$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		$heading=Yii::app()->db
         ->createCommand("SELECT headingRef FROM tbl_streetview")
         ->where('property_id=:property_id and order_no=1', array(':property_id'=>$property_id))
         ->queryScalar();

         if($heading=="")
         	$heading=0;

		//$heading=StreetView::model()->findByAttributes(array('property_id'=>$property_Id,'order_no'=>1))->headingRef;
		return $heading;

	} 

	//Yii::app()->baseUrl




	public function getTilesDefault()
	{
		$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		//$model=StreetView::model()->findAll(array('property_id'=>$property_Id,'order_no'=>1));
		$criteria=new CDbCriteria();
		$model=StreetView::model()->find($criteria);

		$tileSizeX=$model->tileSizeX;
		$tileSizeY=$model->tileSizeY;
		$worldSizeX=$model->worldSizeX;
		$worldSizeY=$model->worldSizeY;

		$str= "\tlinks: [],\n";
    	$str.= "\tcopyright: 'www.vthai.net',\n";
    	$str.= "\ttiles:\n"; 
    	$str.= "\t{\n";
        $str.= "\t\ttileSize: new google.maps.Size(".$tileSizeX.", ".$tileSizeY."),\n";
        $str.= "\t\tworldSize: new google.maps.Size(".$worldSizeX.", ".$worldSizeY."),\n";
        $str.= "\t\tcenterHeading: 0,\n";
        $str.= "\t\tgetTileUrl: getCustomPanoramaTileUrl\n";
     	$str.= "\t}\n";

     	return $str;

	}

	public function renderPano()
	{
		//$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		$property_id=3;
		$criteria=new CDbCriteria();
		$criteria->select ="panoID,lat,lng";
		$criteria->condition="property_id=:property_id";
		$criteria->params=array(':property_id'=>$property_id);


		$models=StreetView::model()->findAll($criteria);
		$count=Count($models);
		$str="";
		//foreach($models as $model)
		for($i=0;$i<$count;$i++)
		{
				$str.="\tcase '".$models[$i]->panoID."':\n";
				$str.="\tstreetViewPanoramaData['location'] = {\n";
				$str.="\tpano:'".$models[$i]->panoID."',\n";
				$str.="\tdescription:'".$models[$i]->title."',\n";
				$str.="\tlatLng: new google.maps.LatLng(".$models[$i]->lat.",".$models[$i]->lng.")\n";
				$str.="\t}\n";
				$str.="\treturn streetViewPanoramaData;\n";
        }

        return $str;
	}

	private function getPanoID($link_id)
	{

		$panoID=StreetView::model()->findByAttributes(array('id'=>$link_id))->panoID;
		return $panoID;
	}

	private function getHeadingRef($link_id)
	{

		$headingRef=StreetView::model()->findByAttributes(array('id'=>$link_id))->headingRef;
		return $headingRef;
	}

	public function actionTest()
	{
			$model=new Streetview();

		$this->render('Test',array('model'=>$model
			
		));

	}

	public function renderLink()
	{
		//$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		$property_id=3;
		$criteria=new  CDbCriteria();
		$criteria->select ="panoID,id";
		$criteria->condition="property_id=:property_id";
		$criteria->params=array(":property_id"=>$property_id);
		$models=StreetView::model()->findAll($criteria);
		$count=Count($models);

		//echo $count;
		$str="";
		for($i=0;$i<$count;$i++)
		{
		
      		$str.="case '".$models[$i]->panoID."':\n";
      		$Streetview_id=$models[$i]->id;
      		$criteria_in=new CDbCriteria();
      		$criteria_in->select="title,pano_LinkID,angle";
      		$criteria_in->condition="Streetview_id=:Streetview_id";
      		$criteria_in->params=array(":Streetview_id"=>$Streetview_id);

      		$modelLinks=Pointlink::model()->findAll($criteria_in);
      		$count_in=Count($modelLinks);
      			for($j=0;$j<$count_in;$j++)
      			{
      				$str.="\tlinks.push({\n";
      				$str.="\t\tdescription : '".$modelLinks[$j]->title."',\n";
      				$str.="\t\tpano : '".$this->getPanoID($modelLinks[$j]->pano_LinkID)."',\n";
      				$str.="\t\theading : ".$this->getHeadingRef($modelLinks[$j]->pano_LinkID)."\n";
      				$str.="\t});\n";
      			}
      		
			$str.="\tbreak;\n";
		}

		return $str;

	}



	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>Yii::app()->user->getAdmin(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	/******************
	Display Streetview

	*******************/
	public function actionShowStreetview()
	{
		$model=new Streetview();
		$this->render('showStreetView',array('model'=>$model
			
		));
	}

	public function  getOrderNo()
	{
		$property_id= Yii::app()->getRequest()->getQuery('param'); 	
		$maxOrder=0;
		if(Yii::app()->controller->action->id=="create")
		{
		
		 $maxOrder = Yii::app()->db
         ->createCommand("SELECT MAX(order_no) FROM tbl_streetview")
         ->where('property_id=:property_id', array(':property_id'=>$property_id))
         ->queryScalar();
         

				if($maxOrder=="")
					$maxOrder=1;
				else
					$maxOrder+=1;
		}
		else
		{
			$id=Yii::app()->request->getQuery('id');
			$maxOrder = Yii::app()->db
         	->createCommand("SELECT order_no FROM tbl_streetview")
         	->where('id=:id', array(':id'=>$id))
         	->queryScalar();
		
		}
		return $maxOrder;

	}


	public  function getPictureID($property_id)
	{
		return 'S'.$property_id.mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Streetview;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Streetview']))
		{
			$property_id= Yii::app()->getRequest()->getQuery('param'); 
			$model->attributes=$_POST['Streetview'];
			$uniqueName = $this->getPictureID($property_id).".jpg";
		    $original = 'upload/SourceStreetView/'.$uniqueName;

		    $picture = CUploadedFile::getInstance($model, 'originalimage');


            if (!empty($picture)) 
            {
	            $model->originalimage = $picture;
	            $model->originalimage->saveAs($original);
	            $model->originalimage = '/upload/SourceStreetView/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->save($original);
			}

			 $model->property_id=$property_id;


			if($model->save())
			{
				/***********************************/
				if (!empty($picture))
				 {
						$id=$model->id;
						$splitter = new ImageSplitter;
						$splitter->setImagePath("Upload/StreetView");
						$splitter->outputType = IMAGETYPE_JPEG;

						$splitter->Load('Upload/SourceStreetView/'.$uniqueName);
						$splitter->Split2D($model->property_id,$model->id,8,4);

						$model=$this->loadModel($id);
						$model->worldSizeX=$splitter->getSrcWidth();
						$model->worldSizeY=$splitter->getSrcHeight();
						$model->tileSizeX=$splitter->getTileSizeX();
						$model->tileSizeY=$splitter->getTileSizeY();
						$model->panoID=$splitter->getPanoID();
						$model->save();
				}

				/************************************/


				$this->redirect(array('create','param'=>$property_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Streetview']))
		{
			
			$model->attributes=$_POST['Streetview'];

			$property_id= Yii::app()->getRequest()->getQuery('param'); 
			$uniqueName = $this->getPictureID($property_id).".jpg";
		    $original = 'upload/SourceStreetView/'.$uniqueName;

		    $picture = CUploadedFile::getInstance($model, 'originalimage');

		    if (!empty($picture)) 
            {
	            $model->originalimage = $picture;
	            $model->originalimage->saveAs($original);
	            $model->originalimage = '/upload/SourceStreetView/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->save($original);
			}

			 $model->property_id=$property_id;


			if($model->save()){

				if (!empty($picture))
				{
						$id=$model->id;
						$splitter = new ImageSplitter;
						$splitter->setImagePath("Upload/StreetView");
						$splitter->outputType = IMAGETYPE_JPEG;

						$splitter->Load('Upload/SourceStreetView/'.$uniqueName);
						$splitter->Split2D($model->property_id,$model->id,8,4);

						$model=$this->loadModel($id);
						$model->worldSizeX=$splitter->getSrcWidth();
						$model->worldSizeY=$splitter->getSrcHeight();
						$model->tileSizeX=$splitter->getTileSizeX();
						$model->tileSizeY=$splitter->getTileSizeY();
						$model->panoID=$splitter->getPanoID();
						$model->save();

				}


				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id,'param'=>$property_id));
			}	
		}

		$lists=new Streetview('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['Streetview']))
			$lists->attributes=$_GET['Streetview'];

		$this->render('update',array(
			'model'=>$model,
			'lists'=>$lists,
		));

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Streetview');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Streetview('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Streetview']))
			$model->attributes=$_GET['Streetview'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Streetview the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Streetview::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Streetview $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='streetview-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
