<?php

class GalleryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
	/**

		
	**/

	public  function GetPictureID()
	{
		return mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	}

	public function getPictureCount($property_id)
	{

        
        $galleries = Gallery::model()->findAllByAttributes(array(
            'property_id'=> $property_id
        ));

		$count = count($galleries);
        return $count;
       
	}

	public function updatePictureProperty($property_id,$picture)
	{
	
		$model=Property::model()->findByAttributes(array('id'=>$property_id));
		$model->attributes=array('picture'=>$picture);
		$model->save();
		//echo "Value ".$property_id;
		//if($model->save())
		//	{echo "OK";}
		//else
		//	{echo "Fail";}

		 // Yii::app()->db->createCommand("update  tbl_property set picture='".$picture."' where id=".$property_id)->execute();


	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Gallery;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gallery']))
		{
			$property_id= Yii::app()->getRequest()->getQuery('param'); 
			$model->attributes=$_POST['Gallery'];
			$uniqueName = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y")).'.jpg';
		    $original = 'upload/Galleries/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'path');

            if (!empty($picture)) {
	            $model->path = $picture;
	            $model->path->saveAs($original);
	            $model->path = '/upload/Galleries/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->adaptiveResize(250,250);
				$thumb->save($original);


	            if($this->getPictureCount($property_id)==0)
	            {
	            	//echo "Empty property id : ".$property_id;
	            	$this->updatePictureProperty($property_id, $model->path);
	            }
	            else

	            {
	               echo "Not Empty property id : ".$property_id;

	            }


            }
            $model->property_id=$property_id;


			if($model->save())
			{
				
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

		if(isset($_POST['Gallery']))
		{
			$property_id= Yii::app()->getRequest()->getQuery('param'); 
			$model->attributes=$_POST['Gallery'];
			$uniqueName = GetPictureID().'.jpg';
		    $original = 'upload/Galleries/'.$uniqueName;

            $picture = CUploadedFile::getInstance($model, 'path');

            if (!empty($picture)) {
	            $model->path = $picture;
	            $model->path->saveAs($original);
	            $model->path = '/upload/Galleries/'.$uniqueName;
	            $thumb=Yii::app()->phpThumb->create($original);
				$thumb->adaptiveResize(250,250);
				$thumb->save($original);
            }
            $model->property_id=$property_id;

			if($model->save()){
				Yii::app()->user->setFlash('response','');
				$this->redirect(array('update','id'=>$model->id));
			}	
		}

		$lists=new Gallery('search');
		$lists->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$lists->attributes=$_GET['Gallery'];

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
		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gallery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
