<?php
/* @var $this StreetviewController */
/* @var $model Streetview */

$this->breadcrumbs=array(
	'Streetviews'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Streetview', 'url'=>array('index')),
	array('label'=>'Create Streetview', 'url'=>array('create')),
	array('label'=>'Update Streetview', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Streetview', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Streetview', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Streetview #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'title',
		'property_id',
		'originalimage',
		'worldSizeX',
		'worldSizeY',
		'tileSizeX',
		'tileSizeY',
		'lat',
		'lng',
		'panoID',
	),
)); ?>
</div>