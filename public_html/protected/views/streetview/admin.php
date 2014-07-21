<?php
/* @var $this StreetviewController */
/* @var $model Streetview */

$this->breadcrumbs=array(
	'Streetviews'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Streetview', 'url'=>array('index')),
	array('label'=>'Create Streetview', 'url'=>array('create')),
);

$pid= Yii::app()->getRequest()->getQuery('param'); 


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#streetview-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">Manage Streetviews</span></h2>



<div class="panel panel-default">
	<div class="panel-heading">
	  <h4 class="panel-title">
	    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
	      Advanced Search
	    </a>
	  </h4>
	</div>
	<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
	  <div class="panel-body">
	    <?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>	  </div>
	</div>
</div>
<div class="table-responsive">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'streetview-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table',
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'template'=>'{summary} {pager} {items} {pager}',
	'pagerCssClass'=>'text-center col-sm-12',
	'pager' => array('header'=>'','htmlOptions'=>array('class'=>'pagination',)),
	'columns'=>array(
		'id',
		'title',
		'property_id',
		'originalimage',
		'worldSizeX',
		'worldSizeY',
		/*
		'tileSizeX',
		'tileSizeY',
		'lat',
		'lng',
		'panoID',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width:150px;'),
		    'template'=>'{pointlink} {update} {delete}',
		    'buttons'=>array(
		    	'view'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            //'url'=>'Yii::app()->createUrl("blog/$data->slug")',
		            'options'=>array(
		            	'class'=>'fa fa-eye btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'View'
		            ),
		        ),
		        'update'=> array(
		            'label'=>'',
		            'imageUrl'=>'',
		             'url'=>'Yii::app()->createUrl(\'Streetview/update\', array(\'id\'=>$data->id,\'param\'=>'.$pid.'))',

		            'options'=>array(
		            	'class'=>'fa fa-pencil btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Update'
		            ),
		        ),

		        'pointlink' => array
		        (
		            'label'=>'',
		            'url'=>'Yii::app()->createUrl(\'Pointlink/create\', array(\'streetview_id\'=>$data->id,\'property_id\'=>'.$pid.'))',
		            'options'=>array(
		            	'class'=>'glyphicon glyphicon-road btn btn-default ',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            ),
		        ),



		        'delete'=>array(
		            'label'=>'',
		            'imageUrl'=>'',
		            'options'=>array(
		            	'class'=>'fa fa-trash-o btn btn-default',
		            	'rel'=>'tooltip',
		            	'data-toggle'=>'tooltip',
		            	'data-placement'=>'top',
		            	'data-original-title'=>'Delete',
		            	
		            ),
		        ),
		    ),
		),
	),
)); ?>
</div>
</div>