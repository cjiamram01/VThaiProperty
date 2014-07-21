<?php

class MarkerController extends Controller
{
	public function actionIndex()
	{
		//$this->render('index');
		$places=Property::model()->findAll(array(
            'order'=>'id DESC',
            //'condition'=>'status="1"',
    	));

		header('Content-Type: application/xml');
    	$this->renderPartial('../Marker/Index',array(
        'places'=>$places,
        ));
	}

	public function actionqueryMarker(){

		$places=Property::model()->findAll(array(
            'order'=>'id DESC',
            //'condition'=>'status="1"',
    	));

		header('Content-Type: application/xml');
    	$this->renderPartial('../Marker/queryMarker',array(
        'places'=>$places,
        ));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}