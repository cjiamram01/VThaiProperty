<?php
/* @var $this ResidentailtypeController */
/* @var $model Residentailtype */

$this->breadcrumbs=array(
	'Residentailtypes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Residentailtype', 'url'=>array('index')),
	array('label'=>'Create Residentailtype', 'url'=>array('create')),
	array('label'=>'Update Residentailtype', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Residentailtype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Residentailtype', 'url'=>array('admin')),
);
?>

<div class="container">

<h2 class="headline first-child text-color"><span class="border-color">View Residentailtype #<?php echo $model->id; ?></span></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array('class'=>'table table-hover table-condensed'),
	'attributes'=>array(
		'id',
		'title_en',
		'title_th',
	),
)); ?>
</div>