<?php
/* @var $this PointlinkController */
/* @var $model Pointlink */

$this->breadcrumbs=array(
	'Pointlinks'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Pointlink', 'url'=>array('index')),
	array('label'=>'Create Pointlink', 'url'=>array('create')),
	array('label'=>'Update Pointlink', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pointlink', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pointlink', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Pointlink #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'Streetview_id',
		'title',
		'angle',
		'pano_LinkID',
	),
)); ?>
</div>